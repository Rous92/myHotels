<?php

namespace MyHotels\Tests\Core\Domain\Model\Room\Mother;

use MyHotels\Core\Domain\Model\Room\RoomHasSafe;
use MyHotels\Tests\Shared\Domain\Boolean;

class RoomHasSafeMother
{
    public static function create(bool $hasSafe): RoomHasSafe
    {
        return new RoomHasSafe($hasSafe);
    }

    public static function random()
    {
        return self::create(Boolean::random());
    }
}
