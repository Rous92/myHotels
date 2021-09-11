<?php

namespace MyHotels\Core\Domain\Model\Room;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;

final class RoomHasAirConditioner extends IntValueObject
{
    public function __construct(int $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(?string $value): void
    {
        try {
            Assertion::notEmpty($value, 'Has air conditioner is empty');
            Assertion::boolean($value, 'Has air conditioner is not a boolean');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
