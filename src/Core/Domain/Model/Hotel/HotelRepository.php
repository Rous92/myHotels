<?php

namespace MyHotels\Core\Domain\Model\Hotel;

interface HotelRepository
{
    public function find(HotelId $id): ?Hotel;

    public function findWithRoomsAndBookings(HotelId $id);
}
