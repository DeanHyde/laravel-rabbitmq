<?php


namespace DeanKH\RabbitMQ\Messaging\Facades;


use Illuminate\Support\Facades\Facade;

class RabbitMQFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'queue.v9.messaging';
    }
}