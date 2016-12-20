<?php

namespace Netsan\Helper;

class ArrayChain
{
    protected $container = [];

    public function __construct(array $config = [])
    {
        $this->container = array_map(function ($value) {
            return is_array($value) ? new static($value) : $value; 
        }, $config);
    }

    public static function make(array $array = [])
    {
        return new self($array);
    }

    public function has($name)
    {
        return isset($this->container[$name]);
    }

    public function get($name, $default = null)
    {
        return $this->has($name) ? $this->container[$name] : $default;
    }

    public function toArray()
    {
        return array_map(function ($value) {
            return $value instanceof self ? $value->toArray() : $value;
        }, $this->container);
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    public function __isset($name)
    {
        return $this->has($name);
    }
}

