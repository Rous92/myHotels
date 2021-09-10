<?php

declare(strict_types=1);

namespace MyHotels\Shared\Domain\Model\ValueObject;

abstract class IntValueObject
{
    public function __construct(protected int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }
}
