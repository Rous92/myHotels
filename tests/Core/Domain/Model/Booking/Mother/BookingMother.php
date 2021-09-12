<?php

namespace MyHotels\Tests\Core\Domain\Model\Booking\Mother;

use MyHotels\Core\Domain\Model\Booking\Booking;

final class BookingMother
{
    public static function create(
        ?int $bookingId = null,
        ?string $bookingFirstName = null,
        ?string $bookingLastName = null,
        ?string $bookingEmail = null,
        ?string $bookingEntryDate = null,
        ?string $bookingLeavingDate = null,
        ?int $bookingNumOfGuests = null,
        ?int $bookingRoomId = null,
    ): Booking {
        return new Booking(
            $bookingId ?? BookingIdMother::random()->value(),
            $bookingFirstName ?? BookingFirstNameMother::random(),
            $bookingLastName ?? BookingLastNameMother::random(),
            $bookingEmail ?? BookingEmailMother::random(),
            $bookingEntryDate ?? BookingEntryDateMother::random(),
            $bookingLeavingDate ?? BookingLeavingDateMother::random(),
            $bookingNumOfGuests ?? BookingNumOfGuestsMother::random(),
            $bookingRoomId ?? BookingRoomIdMother::random(),
        );
    }
}
