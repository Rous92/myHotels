<?php

namespace MyHotels\Core\Infrastructure\Persistence\MySql\Repository\Hotel;

use MyHotels\Core\Domain\Model\Hotel\Hotel;
use MyHotels\Core\Domain\Model\Hotel\HotelRepository;
use MyHotels\Shared\Infrastructure\Persistence\MySql\DoctrineRepository;

class HotelMySqlRepository extends DoctrineRepository implements HotelRepository
{
    const ENTITY = Hotel::class;

    public function find(int $id): ?Hotel
    {
        return $this->repository(self::ENTITY)->find($id);
    }

    public function findWithRooms(int $id)
    {
        $queryBuilder = $this->entityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('hotel')
            ->from(self::ENTITY, 'hotel')
            ->leftJoin('hotel.rooms', 'rooms')
            ->where('hotel.id = :id')
            ->setParameter(':id', $id);

        $query = $queryBuilder->getQuery();

        return $query->getOneOrNullResult();
    }
}
