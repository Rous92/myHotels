<?php

namespace MyHotels\Core\Domain\Model;

interface HotelRepository
{
    public function find(int $id): ?Hotel;
}
