<?php


namespace DeanKH\RabbitMQ;


use Illuminate\Support\ServiceProvider as SupportServiceProvider;
use DeanKH\RabbitMQ\Messaging\MessagingServiceProvider;
use DeanKH\RabbitMQ\Queue\QueueServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public function register()
    {
        $this->app->register(QueueServiceProvider::class);
        $this->app->register(MessagingServiceProvider::class);
    }
}