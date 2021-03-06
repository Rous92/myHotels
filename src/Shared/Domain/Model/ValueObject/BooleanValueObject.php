<?php

declare(strict_types=1);

namespace MyHotels\Shared\Domain\Model\ValueObject;

abstract class BooleanValueObject
{
    public function __construct(protected bool $value)
    {
    }

    public function value(): bool
    {
        return $this->value;
    }
}
