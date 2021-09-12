<?php

namespace MyHotels\Tests\Core\Domain\Model\Room\Mother;

use MyHotels\Core\Domain\Model\Room\RoomHasTelevision;
use MyHotels\Tests\Shared\Domain\Boolean;

class RoomHasTelevisionMother
{
    public static function create(bool $hasTelevision): RoomHasTelevision
    {
        return new RoomHasTelevision($hasTelevision);
    }

    public static function random()
    {
        return self::create(Boolean::random());
    }
}
