<?php

namespace App;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use App\Interfaces\ViewInterface;

class TwigView implements ViewInterface
{
    public function __construct()
    {
        $loader = new FilesystemLoader(realpath(__DIR__ . '/../frontend/templates'));
        $this->twig = new Environment($loader);
    }

    public function render(string $template, array $params = [])
    {
        return $this->twig->render($template, $params);
    }
}