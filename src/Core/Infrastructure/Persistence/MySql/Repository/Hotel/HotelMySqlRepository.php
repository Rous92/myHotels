<?php

namespace MyHotels\Core\Infrastructure\Persistence\MySql\Repository\Hotel;

use MyHotels\Core\Domain\Model\Hotel\Hotel;
use MyHotels\Core\Domain\Model\Hotel\HotelId;
use MyHotels\Core\Domain\Model\Hotel\HotelRepository;
use MyHotels\Shared\Infrastructure\Persistence\MySql\DoctrineRepository;

class HotelMySqlRepository extends DoctrineRepository implements HotelRepository
{
    public const ENTITY = Hotel::class;

    public function save(Hotel $hotel)
    {
        $this->persist($hotel);
    }

    public function find(HotelId $id): ?Hotel
    {
        return $this->repository(self::ENTITY)->find($id->value());
    }

    public function findWithRoomsAndBookings(HotelId $id)
    {
        $queryBuilder = $this->entityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('hotel')
            ->from(self::ENTITY, 'hotel')
            ->leftJoin('hotel.rooms', 'rooms')
            ->leftJoin('hotel.bookings', 'bookings')
            ->where('hotel.id = :id')
            ->setParameter(':id', $id->value());

        $query = $queryBuilder->getQuery();

        return $query->getOneOrNullResult();
    }
}
