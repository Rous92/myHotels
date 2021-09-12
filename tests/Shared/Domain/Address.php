<?php

namespace MyHotels\Tests\Shared\Domain;

final class Address
{
    public static function random(): string
    {
        return Creator::random()->address();
    }
}
