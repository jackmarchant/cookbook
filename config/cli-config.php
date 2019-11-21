<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\CookbookManager;

require_once __DIR__ . '/../bootstrap.php';

return ConsoleRunner::createHelperSet(CookbookManager::create($container));