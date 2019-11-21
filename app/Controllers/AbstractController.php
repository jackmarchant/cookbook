<?php

namespace App\Controllers;

use App\Container;

abstract class AbstractController
{
    public function __construct(Container $container)
    {
        $this->view = $container->get('view');
    }
}