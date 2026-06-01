<?php

namespace Core\Domain\Entity;
use Core\Domain\Entity\Traits\MethodsMagics;

class Category
{
    use MethodsMagics;
    public function __construct(
       protected string $id = '',
       protected string $name = '',
       protected string $description = '',
       protected bool $isActive = true
    ) {}

    public function activate()
    {
        $this->isActive = true;
    }

    public function disable()
    {
        $this->isActive = false;
    }
}