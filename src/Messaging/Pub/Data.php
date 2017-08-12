<?php


namespace V9\RabbitMQ\Messaging\Pub;


class Data
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function __toString()
    {
        return json_encode($this->data);
    }
}