<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\AbstractController;
use App\Domain\Model\Recipe;
use App\Domain\Service\RecipeService;
use App\Container;

class RecipesController extends AbstractController
{
    /** @var RecipeService */
    protected $service;

    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->service = $container->get(RecipeService::class);
    }

    public function index(Request $request, Response $response, $args)
    {
        $recipes = $this->service->findAll();
        return $this->renderResponse($response, 'index.twig', ['recipes' => $recipes]);
    }

    public function recipe(Request $request, Response $response, $params)
    {
        $recipe = $this->service->find($params['id']);
        return $this->renderResponse($response, 'recipe.twig', ['recipe' => $recipe]);
    }

    public function create(Request $request, Response $response)
    {
        if ($request->isGet()) {
            return $this->renderResponse($response, 'create-recipe.twig');
        }

        $recipe = $this->service->create($request->getParsedBody());
        return $this->renderResponse($response, 'recipe.twig', ['recipe' => $recipe]);
    }
}