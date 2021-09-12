<?php

namespace MyHotels\Core\Domain\Model\Room;

use MyHotels\Shared\Domain\Model\ValueObject\BooleanValueObject;

final class RoomHasAirConditioner extends BooleanValueObject
{
    public function __construct(bool $value)
    {
        parent::__construct($value);
    }
}
