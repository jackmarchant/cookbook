<?php

namespace App;

class App
{
    /** @var Database  */
    private $database;

    public function __construct(Container $container)
    {
        $this->database = $container->get('database');
    }

    public function run(): string
    {
        return 'Hello, World!';
    }
}