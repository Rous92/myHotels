<?php

namespace MyHotels\Core\Domain\Model\Booking;

use DateTimeZone;
use MyHotels\Shared\Domain\Model\ValueObject\DateTime;

class BookingEntryDate extends DateTime
{
    public function __construct(?string $time = null, ?DateTimeZone $timezone = null)
    {
        parent::__construct($time, $timezone, self::FORMAT_SHORT);
    }

    public static function fromString(?string $date = 'now'): DateTime
    {
        self::guardFormatValidation($date, self::FORMAT_SHORT);

        return new self($date);
    }
}
