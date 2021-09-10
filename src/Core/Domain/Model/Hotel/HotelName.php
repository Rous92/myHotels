<?php

namespace MyHotels\Core\Domain\Model\Hotel;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\StringValueObject;

final class HotelName extends StringValueObject
{
    public const MIN_LENGTH = 3;
    public const MAX_LENGTH = 60;

    public function __construct(string $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(?string $value): void
    {
        try {
            Assertion::notEmpty($value, 'Name is empty');
            Assertion::minLength($value, self::MIN_LENGTH, 'Name is too short');
            Assertion::maxLength($value, self::MAX_LENGTH, 'Name is too long');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
