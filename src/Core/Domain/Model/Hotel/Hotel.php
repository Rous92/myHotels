<?php

namespace MyHotels\Core\Domain\Model\Hotel;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use MyHotels\Core\Domain\Model\Room\Room;
use MyHotels\Shared\Domain\Model\Entity;

class Hotel implements Entity
{
    private Collection $rooms;

    public function __construct(
        private int             $id,
        private HotelName       $name,
        private HotelAddress    $address,
        private HotelPhone      $phone,
        private HotelNumOfRooms $numOfRooms,
        private HotelNumOfStars $numOfStars,
    )
    {
        $this->rooms = new ArrayCollection();
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

    public function numOfRooms(): HotelNumOfRooms
    {
        return $this->numOfRooms;
    }

    public function numOfStars(): HotelNumOfStars
    {
        return $this->numOfStars;
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
            'num_of_rooms' => $this->numOfRooms->value(),
            'num_of_stars' => $this->numOfStars->value(),
        ];
    }

    public function toJson(): string
    {
       return json_encode($this->toArray());
    }

    public function rooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(Room $room): Hotel
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms[] = $room;
        }

        return $this;
    }
}