<?php

namespace MyHotels\Core\Domain\Model\Booking;

use MyHotels\Shared\Domain\Model\Entity;

class Booking implements Entity
{
    public function __construct(
        private int $id,
        private BookingFirstName $firstName,
        private BookingLastName $lastName,
        private BookingEmail $email,
        private BookingEntryDate $entryDate,
        private BookingLeavingDate $leavingDate,
        private BookingNumOfGuests $numOfGuests,
        private BookingRoomId $roomId
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function firstName(): BookingFirstName
    {
        return $this->firstName;
    }

    public function lastName(): BookingLastName
    {
        return $this->lastName;
    }

    public function email(): BookingEmail
    {
        return $this->email;
    }

    public function entryDate(): BookingEntryDate
    {
        return $this->entryDate;
    }

    public function leavingDate(): BookingLeavingDate
    {
        return $this->leavingDate;
    }

    public function numOfGuests(): BookingNumOfGuests
    {
        return $this->numOfGuests;
    }

    public function roomId(): BookingRoomId
    {
        return $this->roomId;
    }

    public function equals(Entity $other): bool
    {
        return $this::class === $other::class && $this->id === $other->id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->firstName->value(),
            'last_name' => $this->lastName->value(),
            'email' => $this->email->value(),
            'entry_date' => $this->entryDate->shortFormat()->toString(),
            'leaving_date' => $this->leavingDate->shortFormat()->toString(),
            'num_of_guests' => $this->numOfGuests->value(),
            'room_id' => $this->roomId->value(),
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
