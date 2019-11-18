<?php

abstract class AbstractModel
{
    private $id;

    public function getId(): int
    {
        return $this->id;
    }
}