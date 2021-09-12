<?php

namespace MyHotels\Tests\Core\Domain\Model\Hotel\Mother;

use MyHotels\Core\Domain\Model\Hotel\HotelNumOfRooms;
use MyHotels\Tests\Shared\Domain\Number;

class HotelNumOfRoomsMother
{
    public static function create(int $id): HotelNumOfRooms
    {
        return new HotelNumOfRooms($id);
    }

    public static function random()
    {
        return self::create(Number::random(1, 5));
    }
}
