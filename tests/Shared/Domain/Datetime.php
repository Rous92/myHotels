<?php

namespace MyHotels\Tests\Shared\Domain;

use MyHotels\Shared\Domain\Model\ValueObject\DateTime as SharedDateTime;

final class Datetime
{
    public static function create(string $date): SharedDateTime
    {
        return new SharedDateTime($date);
    }

    public static function random(): SharedDateTime
    {
        $date = Creator::random()->dateTime();

        return new SharedDateTime($date->format(SharedDateTime::FORMAT_FULL));
    }
}
