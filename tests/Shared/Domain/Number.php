<?php

namespace MyHotels\Tests\Shared\Domain;

final class Number
{
    public static function random($from = 0, $to = 2147483647): string
    {
        return Creator::random()->numberBetween($from, $to);
    }
}
