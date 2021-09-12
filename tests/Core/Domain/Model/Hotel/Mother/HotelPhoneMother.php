<?php

namespace MyHotels\Tests\Core\Domain\Model\Hotel\Mother;

use MyHotels\Core\Domain\Model\Hotel\HotelPhone;
use MyHotels\Tests\Shared\Domain\PhoneNumber;

class HotelPhoneMother
{
    public static function create(string $phone): HotelPhone
    {
        return new HotelPhone($phone);
    }

    public static function random()
    {
        return self::create(PhoneNumber::random());
    }
}
