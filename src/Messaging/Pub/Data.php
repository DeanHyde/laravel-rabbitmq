<?php


namespace DeanKH\RabbitMQ\Messaging\Pub;


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

    public static function from(array $data)
    {
        return new self($data);
    }

    public function __toString()
    {
        return json_encode($this->data);
    }
}