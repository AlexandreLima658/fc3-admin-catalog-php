<?php

namespace Core\Domain\Entity;
use Core\Domain\Entity\Traits\MethodsMagics;
use Core\Domain\Exception\EntityValidationException;

class Category
{
    use MethodsMagics;
    public function __construct(
       protected string $id = '',
       protected string $name = '',
       protected string $description = '',
       protected bool $isActive = true
    ) {
        $this->validate();
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function disable(): void
    {
        $this->isActive = false;
    }

    public function update(string $name, string $description): void
    {
        $this->name = $name;
        $this->description = $description;

    }

    public function validate(): void
    {
        if(empty($this->name)) {
            throw new EntityValidationException("Name is required");
        }

        if($this->name != '' && (strlen($this->name) < 3 || strlen($this->name) > 255)) {
            throw new EntityValidationException("Name must be between 3 and 255 characters");
        }

        if($this->description != '' && (strlen($this->description) > 255 || strlen($this->description) <= 2)) {
            throw new EntityValidationException("Description must be between 2 and 255 characters");
        }
    }

}