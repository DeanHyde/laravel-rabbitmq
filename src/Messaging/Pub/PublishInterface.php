<?php


namespace V9\RabbitMQ\Messaging\Pub;


interface PublishInterface
{
    /**
     * @param mixed $routes
     * @param $data
     * @param string $configKey
     * @return mixed
     */
    public function route($routes, $data, $configKey = 'publish');
}