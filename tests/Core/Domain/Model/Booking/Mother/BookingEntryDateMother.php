<?php

namespace MyHotels\Tests\Core\Domain\Model\Booking\Mother;

use MyHotels\Core\Domain\Model\Booking\BookingEntryDate;
use MyHotels\Tests\Shared\Domain\Datetime;

class BookingEntryDateMother
{
    public static function create(string $date): BookingEntryDate
    {
        return new BookingEntryDate($date);
    }

    public static function random()
    {
        return self::create(Datetime::random()->toString());
    }
}
