<?php

namespace MyHotels\Tests\Core\Application;

use MyHotels\Core\Application\HotelBookingStatusFinder;
use MyHotels\Tests\Core\Application\Mother\GetBookingStatusMother;
use MyHotels\Tests\Core\Domain\Model\Hotel\Mother\HotelMother;
use MyHotels\Tests\Core\Infrastructure\PHPUnit\CoreIntegrationTestCase;

class HotelBookingStatusFinderTest extends CoreIntegrationTestCase
{
    private HotelBookingStatusFinder $handler;

    protected function setUp(): void
    {
        $this->handler = new HotelBookingStatusFinder($this->hotelRepository());
        parent::setUp();
    }

    public function testShouldFindHotel()
    {
        $hotelBookingStatus = GetBookingStatusMother::create();
        $hotel = HotelMother::create($hotelBookingStatus->hotelId());
        $this->hotelRepositoryFindWithRoomsAndBookingsMustReturn($hotel);

        $this->assertNotNull($this->handler->__invoke($hotelBookingStatus));
    }

    public function testShouldNotFindHotel()
    {
        $this->hotelRepositoryFindWithRoomsAndBookingsMustReturn();
        $hotelBookingStatus = GetBookingStatusMother::create();

        $this->assertNull($this->handler->__invoke(GetBookingStatusMother::create($hotelBookingStatus->hotelId())));
    }
}
