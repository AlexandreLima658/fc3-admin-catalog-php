<?php

namespace Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\TestCase;

class DomainValidationUnitTest extends TestCase
{

    public function testNotNull()
    {
        try {
            $value = '';
            DomainValidation::notNull($value);

            $this->assertTrue(false);
        } catch (\Exception $e) {
            $this->assertInstanceOf(EntityValidationException::class, $e);
        }
    }

    public function testCustomMessageException()
    {
        try {
            $value = '';
            $message = "Custom message";
            DomainValidation::notNull($value, $message);

            $this->assertTrue(false);
        } catch (\Exception $e) {

            $this->assertInstanceOf(EntityValidationException::class, $e, $message);
        }
    }

    public function testStrMaxLength()
    {
        try {
            $value = 'Teste';
            $message = "Custom message";
            DomainValidation::strMaxLength($value, 3, $message);

            $this->assertTrue(false);
        } catch (\Exception $e) {

            $this->assertInstanceOf(EntityValidationException::class, $e, $message);
        }
    }

    public function testStrMinLength()
    {
        try {
            $value = 'Tes';
            $message = "Custom message";
            DomainValidation::strMinLength($value,5, $message);

            $this->assertTrue(false);
        } catch (\Exception $e) {
            $this->assertInstanceOf(EntityValidationException::class, $e, $message);
        }
    }

}