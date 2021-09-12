<?php

namespace MyHotels\Tests\Core\Domain\Model\Booking;

use MyHotels\Tests\Core\Domain\Model\Booking\Mother\BookingMother;
use MyHotels\Tests\Core\Infrastructure\PHPUnit\CoreUnitTestCase;

class BookingTest extends CoreUnitTestCase
{
    public function testItShouldCompareIdentity(): void
    {
        $Booking = BookingMother::create();
        $otherBooking = BookingMother::create($Booking->id());
        $anotherBooking = BookingMother::create();

        $this->assertTrue($Booking->equals($otherBooking));
        $this->assertFalse($Booking->equals($anotherBooking));
    }
}
