<?php

namespace MyHotels\Core\Domain\Model\Booking;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;
use MyHotels\Shared\Domain\Model\ValueObject\StringValueObject;

final class BookingRoomId extends IntValueObject
{
    public function __construct(int $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(int $value): void
    {
        try {
            Assertion::integer($value, 'Room id is not an id');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
