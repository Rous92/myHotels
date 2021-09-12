<?php

namespace MyHotels\Tests\Core\Infrastructure\PHPUnit;

use Mockery;
use Mockery\LegacyMockInterface;
use Mockery\MockInterface;
use MyHotels\Core\Domain\Model\Hotel\Hotel;
use MyHotels\Core\Domain\Model\Hotel\HotelRepository;
use MyHotels\Tests\Shared\Infrastructure\PHPUnit\IntegrationTestCase;

class CoreIntegrationTestCase extends IntegrationTestCase
{
    private ?HotelRepository $hotelRepository = null;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function hotelRepository(): HotelRepository|LegacyMockInterface|MockInterface
    {
        return $this->hotelRepository = $this->hotelRepository ?: Mockery::mock(HotelRepository::class);
    }

    protected function hotelRepositoryFindWithRoomsAndBookingsMustReturn(?Hotel $value = null)
    {
        $this->hotelRepository()->shouldReceive('findWithRoomsAndBookings')->andReturn($value);
    }

    protected function hotelRepositoryFindWithRoomsAndBookingsMustNotBeCalled()
    {
        $this->hotelRepository()->shouldNotReceive('findWithRoomsAndBookings');
    }

    protected function tearDown(): void
    {
        $this->hotelRepository = null;
        Mockery::close();
    }
}
