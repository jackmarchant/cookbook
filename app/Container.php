<?php

namespace App;

/**
 * Dependency Injection Container
 */
class Container
{
    /** @var array $container */
    private $container = [];

    public function __construct(array $config = [])
    {
        $this->container = [
            'settings' => $config,
        ];
    }

    public function set($key, Callable $callable)
    {
        $this->container[$key] = $callable($this);
    }

    public function get($key)
    {
        return $this->container[$key];
    }
}