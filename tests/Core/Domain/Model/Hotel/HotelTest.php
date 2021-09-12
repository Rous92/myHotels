<?php

namespace MyHotels\Tests\Core\Domain\Model\Hotel;

use MyHotels\Tests\Core\Domain\Model\Booking\Mother\BookingMother;
use MyHotels\Tests\Core\Domain\Model\Hotel\Mother\HotelMother;
use MyHotels\Tests\Core\Domain\Model\Room\Mother\RoomMother;
use MyHotels\Tests\Core\Infrastructure\PHPUnit\CoreUnitTestCase;

class HotelTest extends CoreUnitTestCase
{
    public function testItShouldCompareIdentity(): void
    {
        $hotel = HotelMother::create();
        $otherHotel = HotelMother::create($hotel->id());
        $anotherHotel = HotelMother::create();

        $this->assertTrue($hotel->equals($otherHotel));
        $this->assertFalse($hotel->equals($anotherHotel));
    }

    public function testCanAddRoom()
    {
        $hotel = HotelMother::create();
        $room = RoomMother::create();

        $this->assertEquals(0, $hotel->rooms()->count());
        $hotel->addRoom($room);
        $this->assertEquals(1, $hotel->rooms()->count());
    }

    public function testCanAddBooking()
    {
        $hotel = HotelMother::create();
        $booking = BookingMother::create();

        $this->assertEquals(0, $hotel->bookings()->count());
        $hotel->addBooking($booking);
        $this->assertEquals(1, $hotel->bookings()->count());
    }
}
