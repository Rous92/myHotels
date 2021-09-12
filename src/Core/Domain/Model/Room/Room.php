<?php

namespace MyHotels\Core\Domain\Model\Room;

use MyHotels\Shared\Domain\Model\Entity;

class Room implements Entity
{
    public function __construct(
        private int $id,
        private RoomNumOfGuests $numOfGuests,
        private RoomNumOfBeds $numOfBeds,
        private RoomHasTerrace $hasTerrace,
        private RoomHasTelevision $hasTelevision,
        private RoomHasAirConditioner $hasAirConditioner,
        private RoomHasSafe $hasSafe,
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function numOfGuests(): RoomNumOfGuests
    {
        return $this->numOfGuests;
    }

    public function numOfBeds(): RoomNumOfBeds
    {
        return $this->numOfBeds;
    }

    public function hasTerrace(): RoomHasTerrace
    {
        return $this->hasTerrace;
    }

    public function hasTelevision(): RoomHasTelevision
    {
        return $this->hasTelevision;
    }

    public function hasAirConditioner(): RoomHasAirConditioner
    {
        return $this->hasAirConditioner;
    }

    public function hasSafe(): RoomHasSafe
    {
        return $this->hasSafe;
    }

    public function equals(Entity $other): bool
    {
        return $this::class === $other::class && $this->id === $other->id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'num_of_guests' => $this->numOfGuests->value(),
            'num_of_beds' => $this->numOfBeds->value(),
            'has_terrace' => (bool) $this->hasTerrace->value(),
            'has_television' => (bool) $this->hasTelevision->value(),
            'has_air_conditioner' => (bool) $this->hasAirConditioner->value(),
            'has_safe' => (bool) $this->hasSafe->value(),
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
