<?php

namespace tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;
class CategoryUnitTest extends TestCase
{
    public function testAttributes()
    {
        $category = new Category(
            '',
            'Movies',
            'some description',
            true
        );

        $this->assertEquals('Movies', $category->name);
        $this->assertEquals('some description', $category->description);
        $this->assertTrue(true, $category->isActive);
    }

    public function testActivated()
    {
        $category = new Category(
            '1',
            'Movies',
            'some description',
            false
        );

        $this->assertFalse($category->isActive);

        $category->activate();

        $this->assertTrue($category->isActive);

    }

    public function testDisable()
    {
        $category = new Category(
            '1',
            'Movies',
            'some description',
            true
        );

        $this->assertTrue($category->isActive);

        $category->disable();

        $this->assertFalse($category->isActive);

    }
}