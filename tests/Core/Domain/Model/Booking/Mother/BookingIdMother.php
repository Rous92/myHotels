<?php

namespace MyHotels\Tests\Core\Domain\Model\Booking\Mother;

use MyHotels\Core\Domain\Model\Booking\BookingId;
use MyHotels\Tests\Shared\Domain\Number;

class BookingIdMother
{
    public static function create(int $id): BookingId
    {
        return new BookingId($id);
    }

    public static function random()
    {
        return self::create(Number::random());
    }
}
