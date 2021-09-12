<?php

namespace MyHotels\Tests\Core\Application\Mother;

use MyHotels\Core\Application\GetHotelBookingStatus;
use MyHotels\Tests\Shared\Domain\Number;

class GetBookingStatusMother
{
    public static function create(
        ?int $hotelId = null
    ): GetHotelBookingStatus {
        return new GetHotelBookingStatus(
            $hotelId ?? Number::random()
        );
    }
}
