<?php

namespace MyHotels\Core\Domain\Model\Booking;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\StringValueObject;

final class BookingEmail extends StringValueObject
{
    public const MIN_LENGTH = 5;
    public const MAX_LENGTH = 50;

    public function __construct(string $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(string $value): void
    {
        try {
            Assertion::notEmpty($value, 'Email is empty');
            Assertion::email($value, 'Email is not an email');
            Assertion::minLength($value, self::MIN_LENGTH, 'Email is too short');
            Assertion::maxLength($value, self::MAX_LENGTH, 'Email is too long');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
