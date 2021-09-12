<?php

namespace MyHotels\Tests\Core\Domain\Model\Room\Mother;

use MyHotels\Core\Domain\Model\Room\Room;

final class RoomMother
{
    public static function create(
        ?int $roomId = null,
        ?int $roomNumOfGuests = null,
        ?int $roomNumOfBeds = null,
        ?bool $roomHasTerrace = null,
        ?bool $roomHasTelevision = null,
        ?bool $roomHasAirConditioner = null,
        ?bool $roomHasSafe = null
    ): Room {
        return new Room(
            $roomId ?? RoomIdMother::random()->value(),
            $roomNumOfGuests ?? RoomNumOfGuestsMother::random(),
            $roomNumOfBeds ?? RoomNumOfBedsMother::random(),
            $roomHasTerrace ?? RoomHasTerraceMother::random(),
            $roomHasTelevision ?? RoomHasTelevisionMother::random(),
            $roomHasAirConditioner ?? RoomHasAirConditionerMother::random(),
            $roomHasSafe ?? RoomHasSafeMother::random()
        );
    }
}
