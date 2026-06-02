<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class DomainValidation
{
    public static function notNull(string $value, string $message = ""): void
    {
        if(empty($value))
            throw new EntityValidationException($message ?? 'Value cannot be empty.');

    }

    public static function strMaxLength(string $value, int $length = 255, string $message = ""): void
    {
        if(strlen($value) >= $length)
            throw new EntityValidationException($message ?? 'The value must not be greater than {$length} characters.}');

    }

    public static function strMinLength(string $value, int $length = 255, string $message = ""): void
    {
        if(strlen($value) < $length)
            throw new EntityValidationException($message ?? 'The value must be at least {$length} characters.');

    }
}