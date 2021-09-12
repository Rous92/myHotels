<?php

namespace MyHotels\Core\Domain\Model\Booking;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\StringValueObject;

final class BookingFirstName extends StringValueObject
{
    public const MIN_LENGTH = 5;
    public const MAX_LENGTH = 30;

    public function __construct(string $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(string $value): void
    {
        try {
            Assertion::notEmpty($value, 'First name is empty');
            Assertion::minLength($value, self::MIN_LENGTH, 'First name is too short');
            Assertion::maxLength($value, self::MAX_LENGTH, 'First name is too long');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
