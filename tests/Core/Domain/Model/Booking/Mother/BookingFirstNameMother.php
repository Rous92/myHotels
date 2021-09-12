<?php

namespace MyHotels\Tests\Core\Domain\Model\Booking\Mother;

use MyHotels\Core\Domain\Model\Booking\BookingFirstName;
use MyHotels\Tests\Shared\Domain\Name;

class BookingFirstNameMother
{
    public static function create(string $name): BookingFirstName
    {
        return new BookingFirstName($name);
    }

    public static function random()
    {
        return self::create(Name::random());
    }
}
