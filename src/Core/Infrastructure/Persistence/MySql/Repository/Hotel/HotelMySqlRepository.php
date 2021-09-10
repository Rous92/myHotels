<?php

namespace MyHotels\Core\Infrastructure\Persistence\MySql\Repository\Hotel;

use MyHotels\Core\Domain\Model\Hotel\Hotel;
use MyHotels\Core\Domain\Model\Hotel\HotelRepository;
use MyHotels\Shared\Infrastructure\Persistence\MySql\DoctrineRepository;

class HotelMySqlRepository extends DoctrineRepository implements HotelRepository
{
    public function find(int $id): ?Hotel
    {
        return $this->repository(Hotel::class)->find($id);
    }
}
