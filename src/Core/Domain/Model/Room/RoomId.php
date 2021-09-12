<?php

namespace MyHotels\Core\Domain\Model\Room;

use MyHotels\Shared\Domain\Model\ValueObject\IntValueObject;

final class RoomId extends IntValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);
    }
}
