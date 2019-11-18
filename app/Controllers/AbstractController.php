<?php

namespace App\Controllers;

abstract class AbstractController
{
    public function __construct()
    {
        // TOOD: abstract view interface
        $loader = new \Twig\Loader\FilesystemLoader(realpath(__DIR__ . '/../frontend/templates'));
        $twig = new \Twig\Environment($loader);
        $this->view = $twig;
    }
}