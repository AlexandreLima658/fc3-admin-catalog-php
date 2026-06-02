<?php

namespace Core\Domain\ValueObjects;
use Ramsey\Uuid\Uuid as RamseyUuid;
class Uuid
{
    public function __construct(
        protected string $value
    )
    {
        $this->ensureIsValid($value);
    }
    private function ensureIsValid(string $value): void
    {
        if(!RamseyUuid::isValid($value)) {
            throw new \InvalidArgumentException(
                sprintf('"%s" is not a valid UUID.', $value)
            );
        }
    }
    public static function generate(): self
    {
        $uuid = RamseyUuid::uuid4()->toString();
        return new self($uuid);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}