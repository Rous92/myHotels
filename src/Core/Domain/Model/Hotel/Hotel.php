<?php

namespace MyHotels\Core\Domain\Model\Hotel;

use MyHotels\Shared\Domain\Model\Entity;

class Hotel implements Entity
{
    public function __construct(
        private int $id,
        private HotelName $name,
        private HotelAddress $address,
        private HotelPhone $phone,
        private HotelRooms $rooms,
        private HotelStars $stars,
    )
    {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): HotelName
    {
        return $this->name;
    }

    public function address(): HotelAddress
    {
        return $this->address;
    }

    public function phone(): HotelPhone
    {
        return $this->phone;
    }

    public function rooms(): HotelRooms
    {
        return $this->rooms;
    }

    public function stars(): HotelStars
    {
        return $this->stars;
    }

    public function equals(Entity $other): bool
    {
        return $this::class === $other::class && $this->id === $other->id;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name->value(),
            'address' => $this->address->value(),
            'phone' => $this->phone->value(),
            'rooms' => $this->rooms->value(),
            'stars' => $this->stars->value(),
        ];
    }

    public function toJson(): string
    {
       return json_encode($this->toArray());
    }
}