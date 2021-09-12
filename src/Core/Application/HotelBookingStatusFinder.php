<?php

namespace MyHotels\Core\Application;

use MyHotels\Core\Domain\Model\Hotel\Hotel;
use MyHotels\Core\Domain\Model\Hotel\HotelRepository;

class HotelBookingStatusFinder
{
    public function __construct(
        private HotelRepository $hotelRepository
    ) {
    }

    public function __invoke(GetHotelBookingStatus $dto): ?Hotel
    {
        return $this->hotelRepository->findWithRoomsAndBookings($dto->hotelId());
    }
}
