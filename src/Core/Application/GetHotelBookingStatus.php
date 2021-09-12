<?php

namespace MyHotels\Core\Application;

class GetHotelBookingStatus
{
    public function __construct(private ?int $hotelId)
    {
    }

    public function hotelId(): ?int
    {
        return $this->hotelId;
    }
}
