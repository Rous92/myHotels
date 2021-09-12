<?php

namespace MyHotels\Tests\Core\Infrastructure\Persistence\MySql\Repository\Hotel;

use MyHotels\Core\Infrastructure\Persistence\MySql\Repository\Hotel\HotelMySqlRepository;
use MyHotels\Tests\Core\Domain\Model\Booking\Mother\BookingMother;
use MyHotels\Tests\Core\Domain\Model\Hotel\Mother\HotelIdMother;
use MyHotels\Tests\Core\Domain\Model\Hotel\Mother\HotelMother;
use MyHotels\Tests\Core\Domain\Model\Room\Mother\RoomMother;
use MyHotels\Tests\Core\Infrastructure\PHPUnit\CoreInfrastructureRepositoryTestCase;

class HotelMySqlRepositoryRepositoryTest extends CoreInfrastructureRepositoryTestCase
{
    private HotelMySqlRepository $repository;

    public function testItFindsHotel()
    {
        $expectedHotel = HotelMother::create();

        $this->repository->save($expectedHotel);
        $hotel = $this->repository->find(HotelIdMother::create($expectedHotel->id()));

        $this->assertTrue($expectedHotel->equals($hotel));
    }

    public function testItDoesNotFindHotel()
    {
        $hotel = $this->repository->find(HotelIdMother::random());

        $this->assertNull($hotel);
    }

    public function testItFindsHotelWithRoomsAndBookings()
    {
        $expectedHotel = HotelMother::create();
        $expectedRoom = RoomMother::create();
        $expectedBooking = BookingMother::create();
        $expectedHotel->addRoom($expectedRoom);
        $expectedHotel->addBooking($expectedBooking);

        $this->repository->save($expectedHotel);
        $hotel = $this->repository->findWithRoomsAndBookings(HotelIdMother::create($expectedHotel->id()));

        $this->assertTrue($expectedHotel->equals($hotel));
        $this->assertCount(1, $hotel->rooms());
        $this->assertTrue($hotel->rooms()->first()->equals($expectedRoom));
        $this->assertCount(1, $hotel->bookings());
        $this->assertTrue($hotel->bookings()->first()->equals($expectedBooking));
    }

    public function testItDoesNotFindHotelWithRoomsAndBookings()
    {
        $hotel = $this->repository->findWithRoomsAndBookings(HotelIdMother::random());

        $this->assertNull($hotel);
    }

    public function testItSavesHotel()
    {
        $expectedHotel = HotelMother::create();

        $this->repository->save($expectedHotel);
        $hotel = $this->repository->find(HotelIdMother::create($expectedHotel->id()));

        $this->assertTrue($expectedHotel->equals($hotel));
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new HotelMySqlRepository($this->entityManager);
    }
}
