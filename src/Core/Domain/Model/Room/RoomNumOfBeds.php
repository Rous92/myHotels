<?php

namespace MyHotels\Core\Domain\Model\Room;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;

final class RoomNumOfBeds extends IntValueObject
{
    public const MIN_NUM_OF_BEDS = 1;
    public const MAX_NUM_OF_BEDS = 5;

    public function __construct(int $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(int $value): void
    {
        try {
            Assertion::notEmpty($value, 'Num of beds is empty');
            Assertion::min($value, self::MIN_NUM_OF_BEDS, 'Num of beds is lower than expected');
            Assertion::max($value, self::MAX_NUM_OF_BEDS, 'Num of beds is higher than expected');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
