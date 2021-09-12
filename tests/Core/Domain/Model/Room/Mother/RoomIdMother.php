<?php

namespace MyHotels\Tests\Core\Domain\Model\Room\Mother;

use MyHotels\Core\Domain\Model\Room\RoomId;
use MyHotels\Tests\Shared\Domain\Number;

class RoomIdMother
{
    public static function create(int $id): RoomId
    {
        return new RoomId($id);
    }

    public static function random()
    {
        return self::create(Number::random());
    }
}
