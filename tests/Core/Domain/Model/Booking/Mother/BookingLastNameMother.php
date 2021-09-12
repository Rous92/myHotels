<?php

namespace MyHotels\Tests\Core\Domain\Model\Booking\Mother;

use MyHotels\Core\Domain\Model\Booking\BookingLastName;
use MyHotels\Tests\Shared\Domain\Name;

class BookingLastNameMother
{
    public static function create(string $name): BookingLastName
    {
        return new BookingLastName($name);
    }

    public static function random()
    {
        return self::create(Name::random());
    }
}
