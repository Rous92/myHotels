<?php

namespace MyHotels\Tests\Core\Domain\Model\Room\Mother;

use MyHotels\Core\Domain\Model\Room\RoomHasTerrace;
use MyHotels\Tests\Shared\Domain\Boolean;

class RoomHasTerraceMother
{
    public static function create(bool $hasTerrace): RoomHasTerrace
    {
        return new RoomHasTerrace($hasTerrace);
    }

    public static function random()
    {
        return self::create(Boolean::random());
    }
}
