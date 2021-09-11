<?php

namespace MyHotels\Core\Application\Transformers;


use MyHotels\Core\Domain\Model\Hotel\Hotel;
use MyHotels\Shared\Application\Transformer\TransformableEntity;

final class HotelBookingStatusTransformer implements TransformableEntity
{
    private Hotel $data;

    public function write($data): TransformableEntity
    {
        $this->data = $data;
        return $this;
    }

    public function read()
    {
        $hotelData = $this->data->toArray();
        $hotelData['rooms'] = [];
        $hotelData['bookings'] = [];

        foreach ($this->data->rooms() as $room) $hotelData['rooms'][] = $room->toArray();
        foreach ($this->data->bookings() as $booking) $hotelData['bookings'][] = $booking->toArray();

        return $hotelData;
    }
}