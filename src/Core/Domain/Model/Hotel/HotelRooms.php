<?php

namespace MyHotels\Core\Domain\Model\Hotel;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;
use MyHotels\Shared\Domain\Model\ValueObject\StringValueObject;

final class HotelRooms extends IntValueObject
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
            Assertion::notEmpty($value, 'Rooms is empty');
            Assertion::integer($value, 'Rooms is not an integer');
            Assertion::max($value, self::MAX_NUM_OF_ROOMS, 'Rooms is higher than expected');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
