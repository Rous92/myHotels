<?php

namespace MyHotels\Core\Domain\Model\Hotel;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;

final class HotelNumOfRooms extends IntValueObject
{
    public const MIN_NUM_OF_ROOMS = 1;
    public const MAX_NUM_OF_ROOMS = 500;

    public function __construct(int $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(int $value): void
    {
        try {
            Assertion::min($value, self::MIN_NUM_OF_ROOMS, 'Num of rooms is lower than expected');
            Assertion::max($value, self::MAX_NUM_OF_ROOMS, 'Num of rooms is higher than expected');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
