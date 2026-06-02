<?php

namespace tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use Ramsey\Uuid\Uuid;

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

        $this->assertNotEmpty($category->id());
        $this->assertEquals('Movies', $category->name);
        $this->assertEquals('some description', $category->description);
        $this->assertTrue(true, $category->isActive);
    }

    public function testActivated()
    {
        $uuid  = (string) Uuid::uuid4()->toString();
        $category = new Category(
            $uuid,
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
        $uuid  = (string) Uuid::uuid4()->toString();

        $category = new Category(
            $uuid,
            'Movies',
            'some description',
            true
        );

        $this->assertTrue($category->isActive);
        $category->disable();
        $this->assertFalse($category->isActive);

    }

    public function testUpdateCategory()
    {
        $uuid = (string) Uuid::uuid4()->toString();

        $category = new Category(
            $uuid,
            'Movies',
            'some description',
            true
        );

        $category->update(
            'New name',
            'New some description'
        );

        $this->assertEquals($uuid, $category->id());
        $this->assertEquals('New name', $category->name);
        $this->assertEquals('New some description', $category->description);

    }

    public function testExceptionName()
    {
        try {
            $uuid  = (string) Uuid::uuid4()->toString();

            $category = new Category(
                $uuid,
                'Mo',
                'some description',
                true
            );

            $this->assertTrue(false);

        } catch (\Exception $e) {
            $this->assertInstanceOf(EntityValidationException::class, $e);
        }
    }

}