<?php

use App\Container;
use App\Database;
use App\App;

require __DIR__ . '/../vendor/autoload.php';

$settings = require __DIR__ . '/../app/settings.php';

$container = new Container($settings);

$container->set('database', function ($container) {
    return Database::connect($container->get('settings')['database']);
});

$app = new App($container);

echo $app->run();