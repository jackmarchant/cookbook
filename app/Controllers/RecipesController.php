<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\AbstractController;

class RecipesController extends AbstractController
{
    public function index(Request $request, Response $response, $args)
    {
        $response->getBody()->write($this->view->render('index.twig'));
        return $response;
    }

    public function recipe(Request $request, Response $response, $params)
    {
        $response->getBody()->write($this->view->render('recipe.twig', ['id' => $params['id']]));
        return $response;
    }
}