<?php

namespace MyHotels\Tests\Core\Domain\Model\Room\Mother;

use MyHotels\Core\Domain\Model\Room\RoomHasAirConditioner;
use MyHotels\Tests\Shared\Domain\Boolean;

class RoomHasAirConditionerMother
{
    public static function create(bool $hasAirConditioner): RoomHasAirConditioner
    {
        return new RoomHasAirConditioner($hasAirConditioner);
    }

    public static function random()
    {
        return self::create(Boolean::random());
    }
}
