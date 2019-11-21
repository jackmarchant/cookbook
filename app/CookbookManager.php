<?php

namespace App;

use Doctrine\ORM\Decorator\EntityManagerDecorator;
use Doctrine\ORM\Tools\Setup as DoctrineSetup;
use Doctrine\ORM\EntityManager as DoctrineEntityManager;

/**
 * Skeleton to provide named entity manager for the Cookbook database
 */
class CookbookManager extends EntityManagerDecorator
{
    public static function create($container)
    {
        $databaseSettings = $container->get('settings')['database'];

        $connectionParams = [
            'driver' => 'pdo_mysql',
            'user' => $databaseSettings['username'],
            'password' => $databaseSettings['password'],
            'dbname' => $databaseSettings['dbname'],
            'host' => $databaseSettings['host'],
        ];

        $managerConfig = DoctrineSetup::createAnnotationMetadataConfiguration(
            [__DIR__ . '/Domain/Model'],
            true,
            null,
            null,
            false
        );

        return new self(DoctrineEntityManager::create($connectionParams, $managerConfig));
    }
}
