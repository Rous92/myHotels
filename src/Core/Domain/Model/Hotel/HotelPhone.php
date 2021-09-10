<?php

namespace MyHotels\Core\Domain\Model\Hotel;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DomainException;
use MyHotels\Shared\Domain\Model\ValueObject\StringValueObject;

final class HotelPhone extends StringValueObject
{
    public const MIN_LENGTH = 3;
    public const MAX_LENGTH = 30;

    public function __construct(string $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    private function guard(?string $value): void
    {
        try {
            Assertion::notEmpty($value, 'Phone is empty');
            Assertion::minLength($value, self::MIN_LENGTH, 'Phone is too short');
            Assertion::maxLength($value, self::MAX_LENGTH, 'Phone is too long');
        } catch (AssertionFailedException $e) {
            throw new DomainException($e->getMessage());
        }
    }
}
