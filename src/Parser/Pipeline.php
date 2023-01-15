<?php

namespace SosninAnton\ConsoleCommand\Parser;

class Pipeline
{
    public function __construct(private array $pipes = [], private string $method = '', private $data = null)
    {
    }

    public function pipe($pipe)
    {
        array_push($this->pipes, $pipe);
        return $this;
    }

    public function via($method)
    {
        $this->method = $method;
        return $this;
    }

    public function send($data)
    {
        $this->data = $data;
        return $this;
    }

    public function thenReturn()
    {
        foreach ($this->pipes as $pipeObject) {
            $this->data = $pipeObject->{$this->method}($this->data);
        }

        return $this->data;
    }
}
