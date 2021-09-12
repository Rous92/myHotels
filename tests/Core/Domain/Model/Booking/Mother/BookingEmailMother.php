<?php

namespace MyHotels\Tests\Core\Domain\Model\Booking\Mother;

use MyHotels\Core\Domain\Model\Booking\BookingEmail;
use MyHotels\Tests\Shared\Domain\Email;

class BookingEmailMother
{
    public static function create(string $email): BookingEmail
    {
        return new BookingEmail($email);
    }

    public static function random()
    {
        return self::create(Email::random());
    }
}
