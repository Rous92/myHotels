<?php

namespace MyHotels\Core\Domain\Model\Hotel;

use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;

final class HotelId extends IntValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);
    }
}
