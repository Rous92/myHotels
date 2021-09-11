<?php

namespace MyHotels\Core\Domain\Model\Booking;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;

final class BookingNumOfGuests extends IntValueObject
{
    public const MIN_NUM_OF_GUESTS = 1;
    public const MAX_NUM_OF_GUESTS = 10;

    public function __construct(int $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(?string $value): void
    {
        try {
            Assertion::notEmpty($value, 'Num of guests is empty');
            Assertion::integer($value, 'Num of guests is not an integer');
            Assertion::min($value, self::MIN_NUM_OF_GUESTS, 'Num of guests is lower than expected');
            Assertion::max($value, self::MAX_NUM_OF_GUESTS, 'Num of guests is higher than expected');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
