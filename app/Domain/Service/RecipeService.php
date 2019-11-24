<?php

namespace App\Domain\Service;

use App\Interfaces\RepositoryInterface;
use App\Domain\Model\Recipe;
use App\Interfaces\EntityManagerInterface;
use DateTime;

class RecipeService
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(Recipe::class);
    }

    /**
     * Find all recipes
     *
     * @return array
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * Find a single reciple
     *
     * @param integer $id
     * @return Recipe
     */
    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * Create a new Recipe
     *
     * @param array $params
     * @return Recipe
     */
    public function create(array $params)
    {
        $recipe = new Recipe();
        $recipe
            ->setName($params['name'])
            ->setTotalTime($params['totalTime'])
            ->setServings($params['servings'])
            ->setCreated(new DateTime())
            ->setModified(new DateTime());

        $this->entityManager->persist($recipe);
        $this->entityManager->flush();
        return $recipe;
    }
}