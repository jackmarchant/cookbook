<?php

namespace App;

use Psr\Container\ContainerInterface;

/**
 * Dependency Injection Container
 */
class Container implements ContainerInterface
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

    public function has($key)
    {
        return isset($this->container[$key]);
    }
}