<?php

namespace MyHotels\Tests\Core\Domain\Model\Booking\Mother;

use MyHotels\Core\Domain\Model\Booking\BookingRoomId;
use MyHotels\Tests\Shared\Domain\Number;

class BookingRoomIdMother
{
    public static function create(int $id): BookingRoomId
    {
        return new BookingRoomId($id);
    }

    public static function random()
    {
        return self::create(Number::random());
    }
}
