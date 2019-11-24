<?php

namespace App\Interfaces;

interface EntityManagerInterface
{
    public function getRepository(string $repository);
}