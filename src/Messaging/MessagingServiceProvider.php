<?php


namespace DeanKH\RabbitMQ\Messaging;


use Illuminate\Support\ServiceProvider;
use DeanKH\RabbitMQ\Messaging\Pub\Publisher;
use DeanKH\RabbitMQ\Messaging\Pub\PublishInterface;
use DeanKH\RabbitMQ\Messaging\Sub\ConsumeInterface;
use DeanKH\RabbitMQ\Messaging\Sub\Consumer;

class MessagingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__ . "./../../config/messaging-sample.php" => config_path('messaging.php')], 'config');
    }

    public function register()
    {
        $this->registerConnector();
        $this->registerMessaging();
        $this->bindPubSub();
        // $this->registerFacade();
    }

    public function provides()
    {
        return [
            Connector::class,
            'RabbitMQ',
            V9Messaging::class
        ];
    }

    private function registerConnector()
    {
        $this->app->singleton('queue.v9.connector', function () {
            return (new Connector())->connect(config('queue.connections.rabbitmq'));
        });
    }

    private function registerMessaging()
    {
        $this->app->singleton('queue.v9.messaging', function () {
            /** @var Connector $connector */
            $connector = $this->app['queue.v9.connector'];

            return new V9Messaging($connector);
        });
    }

    private function registerFacade()
    {
        $this->app->alias(V9Messaging::class, 'RabbitMQ');
    }

    private function bindPubSub()
    {
        $this->app->bind(PublishInterface::class, Publisher::class);
        $this->app->bind(ConsumeInterface::class, Consumer::class);
    }
}