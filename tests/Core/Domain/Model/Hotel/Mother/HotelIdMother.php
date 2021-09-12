<?php

namespace MyHotels\Tests\Core\Domain\Model\Hotel\Mother;

use MyHotels\Core\Domain\Model\Hotel\HotelId;
use MyHotels\Tests\Shared\Domain\Number;

class HotelIdMother
{
    public static function create(int $id): HotelId
    {
        return new HotelId($id);
    }

    public static function random()
    {
        return self::create(Number::random());
    }
}
