<?php

namespace MyHotels\Core\Application;

use MyHotels\Core\Domain\Model\Hotel\Hotel;
use MyHotels\Core\Domain\Model\Hotel\HotelId;
use MyHotels\Core\Domain\Model\Hotel\HotelRepository;

class HotelBookingStatusFinder
{
    public function __construct(
        private HotelRepository $hotelRepository
    ) {
    }

    public function __invoke(GetHotelBookingStatus $dto): ?Hotel
    {
        $hotelId = new HotelId($dto->hotelId());

        return $this->hotelRepository->findWithRoomsAndBookings($hotelId);
    }
}
