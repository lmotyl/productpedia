<?php

namespace App\Domain\Entity;

abstract class AbstractEntity
{
    protected int $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }
}
