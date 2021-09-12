<?php

namespace MyHotels\Tests\Shared\Domain;

final class Boolean
{
    public static function random(): string
    {
        return Creator::random()->boolean();
    }

    public static function enabled(): string
    {
        return true;
    }

    public static function disabled(): string
    {
        return false;
    }
}
