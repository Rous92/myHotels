<?php

namespace MyHotels\Tests\Core\Domain\Model\Booking\Mother;

use MyHotels\Core\Domain\Model\Booking\BookingLeavingDate;
use MyHotels\Tests\Shared\Domain\Datetime;

class BookingLeavingDateMother
{
    public static function create(string $date): BookingLeavingDate
    {
        return new BookingLeavingDate($date);
    }

    public static function random()
    {
        return self::create(Datetime::random()->toString());
    }
}
