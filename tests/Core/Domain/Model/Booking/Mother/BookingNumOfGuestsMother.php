<?php

namespace MyHotels\Tests\Core\Domain\Model\Booking\Mother;

use MyHotels\Core\Domain\Model\Booking\BookingNumOfGuests;
use MyHotels\Tests\Shared\Domain\Number;

class BookingNumOfGuestsMother
{
    public static function create(int $numOfGuests): BookingNumOfGuests
    {
        return new BookingNumOfGuests($numOfGuests);
    }

    public static function random()
    {
        return self::create(Number::random(1, 5));
    }
}
