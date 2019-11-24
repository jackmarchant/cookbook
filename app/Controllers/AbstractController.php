<?php

namespace App\Controllers;

use App\Container;
use App\Interfaces\ViewInterface;
use Psr\Http\Message\ResponseInterface as Response;

abstract class AbstractController
{
    /** @var ViewInterface */
    protected $view;

    public function __construct(Container $container)
    {
        $this->view = $container->get('view');
    }

    public function renderResponse(Response $response, string $template, array $params = []): Response
    {
        $response->getBody()->write($this->view->render($template, $params));
        return $response;
    }
}