<?php

use App\Container;
use App\Database;
use App\Router;
use App\App;
use App\TwigView;
use App\CookbookManager;
use App\Controllers\RecipesController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Domain\Service\RecipeService;

require __DIR__ . '/../vendor/autoload.php';

$settings = require __DIR__ . '/../app/settings.php';

$container = new Container($settings);

$container->set('database', function ($container) {
    return Database::connect($container->get('settings')['database']);
});

$container->set('view', function ($container) {
    return new TwigView($twig);
});

$container->set('entityManager', function ($container) {
    return CookbookManager::create($container);
});

$container->set(RecipeService::class, function ($container) {
    return new RecipeService($container->get('entityManager'));
});

// Instantiate App
AppFactory::setContainer($container);
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add routes
$app->get('/', RecipesController::class . ':index');
$app->get('/recipe/create', RecipesController::class . ':create');
$app->post('/recipe/create', RecipesController::class . ':create');
$app->get('/recipe/{id}', RecipesController::class . ':recipe');
$app->get('/recipe/edit/{id}', RecipesController::class . ':edit');
$app->post('/recipe/edit/{id}', RecipesController::class . ':edit');
$app->post('/recipe/delete/{id}', RecipesController::class . ':delete');

$app->run();