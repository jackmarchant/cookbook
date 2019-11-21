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

require __DIR__ . '/vendor/autoload.php';

$settings = require __DIR__ . '/app/settings.php';

$container = new Container($settings);

$container->set('database', function ($container) {
    return Database::connect($container->get('settings')['database']);
});

$container->set('entityManager', function ($container) {
    return CookbookManager::create($container);
});

// Instantiate App
AppFactory::setContainer($container);
AppFactory::create();