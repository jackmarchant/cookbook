<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/app/Domain/Model/Recipe.php';

$entityManager = $container->get('entityManager');

$recipe = new \Entities\Recipe();
$recipe
    ->setName('Margherita Pizza')
    ->setTotalTime('1hr 20 mins')
    ->setServings(8)
    ->setCreated(new \DateTime())
    ->setModified(new \DateTime());

$entityManager->persist($recipe);
$entityManager->flush();
