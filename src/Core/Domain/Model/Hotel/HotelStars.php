<?php

namespace MyHotels\Core\Domain\Model\Hotel;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;
use MyHotels\Shared\Domain\Model\ValueObject\StringValueObject;

final class HotelStars extends IntValueObject
{
    public const MIN_NUM_OF_STARS = 0;
    public const MAX_NUM_OF_STARS = 5;

    public function __construct(int $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(?string $value): void
    {
        try {
            Assertion::notEmpty($value, 'Stars is empty');
            Assertion::integer($value, 'Stars is not an integer');
            Assertion::min($value, self::MIN_NUM_OF_STARS, 'Stars is lower than expected');
            Assertion::max($value, self::MAX_NUM_OF_STARS, 'Stars is higher than expected');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
