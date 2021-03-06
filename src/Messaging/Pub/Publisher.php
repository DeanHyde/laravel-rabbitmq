<?php


namespace DeanKH\RabbitMQ\Messaging\Pub;


use PhpAmqpLib\Message\AMQPMessage;
use DeanKH\RabbitMQ\Messaging\V9Messaging;

class Publisher extends V9Messaging implements PublishInterface
{
    public function route($routes, Data $data, $configKey = 'publish')
    {
        $this->setup($configKey, $routes);
        $message = new AMQPMessage($data);

        $this->publish($message);
        $this->close();
    }
}