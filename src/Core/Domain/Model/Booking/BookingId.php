<?php

namespace MyHotels\Core\Domain\Model\Booking;

use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;

final class BookingId extends IntValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);
    }
}
