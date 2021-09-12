<?php

namespace MyHotels\Core\Application;

use MyHotels\Core\Domain\Model\Hotel\HotelId;

class GetHotelBookingStatus
{
    public function __construct(private HotelId $hotelId)
    {
    }

    public function hotelId(): HotelId
    {
        return $this->hotelId;
    }
}
