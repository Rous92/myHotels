<?php

namespace MyHotels\Tests\Core\Domain\Model\Hotel\Mother;

use MyHotels\Core\Domain\Model\Hotel\Hotel;

final class HotelMother
{
    public static function create(
        ?int $hotelId = null,
        ?string $hotelName = null,
        ?string $hotelAddress = null,
        ?string $hotelPhone = null,
        ?int $hotelNumOfRooms = null,
        ?int $hotelNumOfStars = null,
    ): Hotel {
        return new Hotel(
            $hotelId ?? HotelIdMother::random()->value(),
            $hotelName ?? HotelNameMother::random(),
            $hotelAddress ?? HotelAddressMother::random(),
            $hotelPhone ?? HotelPhoneMother::random(),
            $hotelNumOfRooms ?? HotelNumOfRoomsMother::random(),
            $hotelNumOfStars ?? HotelNumOfStarsMother::random(),
        );
    }
}
