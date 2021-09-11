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

        $rooms = [];
        foreach ($this->data->rooms() as $room) $rooms[] = $room->toArray();

        $hotelData['rooms'] = $rooms;

        return $hotelData;
    }
}