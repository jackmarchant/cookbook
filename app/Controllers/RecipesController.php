<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\AbstractController;
use App\Domain\Model\Recipe;

class RecipesController extends AbstractController
{
    public function index(Request $request, Response $response, $args)
    {
        // TODO: Pull this out to an internal service
        $recipes = $this->entityManager->getRepository(Recipe::class)->findAll();

        $response->getBody()->write($this->view->render('index.twig', ['recipes' => $recipes]));
        return $response;
    }

    public function recipe(Request $request, Response $response, $params)
    {
        // TODO: Pull this out to an internal service
        $recipe = $this->entityManager->getRepository(Recipe::class)->find($params['id']);

        $response->getBody()->write($this->view->render('recipe.twig', ['recipe' => $recipe]));
        return $response;
    }
}