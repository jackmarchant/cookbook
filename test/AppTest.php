<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\App;
use App\Container;

class AppTest extends TestCase
{
    /** @var App */
    private $app;

    public function setUp()
    {
        $container = new Container;
        $this->app = new App($container);
    }

    public function test_it_works()
    {
        $this->assertSame($this->app->run(), 'Hello, World!');
    }
}