<?php

namespace MyHotels\Core\Domain\Model\Hotel;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;

final class HotelNumOfStars extends IntValueObject
{
    public const MIN_NUM_OF_STARS = 0;
    public const MAX_NUM_OF_STARS = 5;

    public function __construct(int $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(int $value): void
    {
        try {
            Assertion::min($value, self::MIN_NUM_OF_STARS, 'Num of stars is lower than expected');
            Assertion::max($value, self::MAX_NUM_OF_STARS, 'Num of stars is higher than expected');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
