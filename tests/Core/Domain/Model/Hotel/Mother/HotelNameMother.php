<?php

namespace MyHotels\Tests\Core\Domain\Model\Hotel\Mother;

use MyHotels\Core\Domain\Model\Hotel\HotelName;
use MyHotels\Tests\Shared\Domain\Name;

class HotelNameMother
{
    public static function create(string $name): HotelName
    {
        return new HotelName($name);
    }

    public static function random()
    {
        return self::create(Name::random());
    }
}
