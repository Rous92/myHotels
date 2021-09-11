<?php

namespace MyHotels\Core\Domain\Model\Booking;

use DateTimeZone;
use MyHotels\Shared\Domain\Model\ValueObject\DateTime;

class BookingLeavingDate extends DateTime
{
    public function __construct(?string $time = null, ?DateTimeZone $timezone = null)
    {
        parent::__construct($time, $timezone, self::FORMAT_FULL);
    }

    public static function fromString(?string $date = 'now'): DateTime
    {
        self::guardFormatValidation($date, self::FORMAT_FULL);

        return new self($date);
    }
}
