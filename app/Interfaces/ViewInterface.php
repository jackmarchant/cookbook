<?php

namespace App\Interfaces;

interface ViewInterface
{
    public function render(string $template, array $params = []);
}