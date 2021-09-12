<?php

namespace MyHotels\Tests\Core\Domain\Model\Room\Mother;

use MyHotels\Core\Domain\Model\Room\RoomNumOfBeds;
use MyHotels\Tests\Shared\Domain\Number;

class RoomNumOfBedsMother
{
    public static function create(int $numOfBeds): RoomNumOfBeds
    {
        return new RoomNumOfBeds($numOfBeds);
    }

    public static function random()
    {
        return self::create(Number::random(1, 5));
    }
}
