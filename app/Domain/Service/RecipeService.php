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
     * Update a recipe
     *
     * @param Recipe $recipe
     * @param array $params
     * @return Recipe
     */
    public function update(Recipe $recipe, array $params)
    {
        $recipe
            ->setName($params['name'])
            ->setTotalTime($params['totalTime'])
            ->setServings($params['servings'])
            ->setIngredients($params['ingredients'])
            ->setMethod($params['method'])
            ->setModified(new DateTime());

        $this->entityManager->flush();
        return $recipe;
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
            ->setIngredients($params['ingredients'])
            ->setMethod($params['method'])
            ->setCreated(new DateTime())
            ->setModified(new DateTime());

        $this->entityManager->persist($recipe);
        $this->entityManager->flush();
        return $recipe;
    }

    /**
     * Delete a Recipe
     *
     * @param Recipe $recipe
     * @return void
     */
    public function delete(Recipe $recipe)
    {
        $this->entityManager->remove($recipe);
        $this->entityManager->flush();
    }
}