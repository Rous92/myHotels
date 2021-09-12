<?php

namespace MyHotels\Tests\Core\Domain\Model\Room\Mother;

use MyHotels\Core\Domain\Model\Room\RoomNumOfGuests;
use MyHotels\Tests\Shared\Domain\Number;

class RoomNumOfGuestsMother
{
    public static function create(int $numOfGuests): RoomNumOfGuests
    {
        return new RoomNumOfGuests($numOfGuests);
    }

    public static function random()
    {
        return self::create(Number::random(1, 5));
    }
}
