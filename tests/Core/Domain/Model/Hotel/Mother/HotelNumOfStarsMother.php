<?php

namespace MyHotels\Tests\Core\Domain\Model\Hotel\Mother;

use MyHotels\Core\Domain\Model\Hotel\HotelNumOfStars;
use MyHotels\Tests\Shared\Domain\Number;

class HotelNumOfStarsMother
{
    public static function create(int $id): HotelNumOfStars
    {
        return new HotelNumOfStars($id);
    }

    public static function random()
    {
        return self::create(Number::random(1, 5));
    }
}
