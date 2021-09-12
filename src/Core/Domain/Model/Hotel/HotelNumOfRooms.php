<?php

namespace MyHotels\Core\Domain\Model\Hotel;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;

final class HotelNumOfRooms extends IntValueObject
{
    public const MAX_NUM_OF_ROOMS = 500;

    public function __construct(int $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(?string $value): void
    {
        try {
            Assertion::notEmpty($value, 'Num of rooms is empty');
            Assertion::integer($value, 'Num of rooms is not an integer');
            Assertion::max($value, self::MAX_NUM_OF_ROOMS, 'Num of rooms is higher than expected');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
