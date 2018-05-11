<?php


namespace DeanKH\RabbitMQ\Queue;


use Illuminate\Queue\QueueManager;
use Illuminate\Support\ServiceProvider;

class QueueServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (is_lumen()) {
            $this->load();
        } else {
            $this->app->booted(function () {
                $this->load();
            });
        }
    }

    /**
     * Register the application's event listeners.
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . "./../../config/queue.php", "queue.connections.rabbitmq");
    }

    public function load()
    {
        /** @var QueueManager $queue */
        $queue = $this->app['queue'];
        $connector = new V9QueueConnector;
        $queue->stopping(function () use ($connector) {
            $connector->connection()->close();
        });
        $queue->addConnector('rabbitmq', function () use ($connector) {
            return $connector;
        });
    }
}