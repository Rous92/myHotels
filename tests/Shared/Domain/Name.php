<?php

namespace MyHotels\Tests\Shared\Domain;

final class Name
{
    public static function random(): string
    {
        return Creator::random()->name();
    }
}
