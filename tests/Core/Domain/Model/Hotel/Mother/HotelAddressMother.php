<?php

namespace MyHotels\Tests\Core\Domain\Model\Hotel\Mother;

use MyHotels\Core\Domain\Model\Hotel\HotelAddress;
use MyHotels\Tests\Shared\Domain\Address;

class HotelAddressMother
{
    public static function create(string $address): HotelAddress
    {
        return new HotelAddress($address);
    }

    public static function random()
    {
        return self::create(Address::random());
    }
}
