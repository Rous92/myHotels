<?php

namespace MyHotels\Tests\Shared\Domain;

final class Email
{
    public static function random(): string
    {
        return Creator::random()->email();
    }
}
