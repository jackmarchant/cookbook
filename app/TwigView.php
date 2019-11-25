<?php

namespace App;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use App\Interfaces\ViewInterface;
use Twig\Extra\Markdown\MarkdownExtension;
use Twig\Extra\Markdown\DefaultMarkdown;
use Twig\Extra\Markdown\MarkdownRuntime;
use Twig\RuntimeLoader\RuntimeLoaderInterface;

class TwigView implements ViewInterface
{
    public function __construct()
    {
        $loader = new FilesystemLoader(realpath(__DIR__ . '/../frontend/templates'));
        $twig = new Environment($loader);
        $engine = new \Parsedown();
        $twig->addExtension(new MarkdownExtension($engine));

        $twig->addRuntimeLoader(new class implements RuntimeLoaderInterface {
            public function load($class) {
                if (MarkdownRuntime::class === $class) {
                    return new MarkdownRuntime(new DefaultMarkdown());
                }
            }
        });
        $this->twig = $twig;
    }

    public function render(string $template, array $params = [])
    {
        return $this->twig->render($template, $params);
    }
}