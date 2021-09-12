<?php

namespace MyHotels\Tests\Shared\Domain;

final class PhoneNumber
{
    public static function random(): string
    {
        return Creator::random()->phoneNumber();
    }
}
