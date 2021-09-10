<?php

namespace MyHotels\Core\Domain\Model\Hotel;

interface HotelRepository
{
    public function find(int $id): ?Hotel;
}
