<?php

namespace MyHotels\Tests\Shared\Domain;

use Faker\Factory;
use Faker\Generator;
use Faker\Provider\es_ES\Person;

final class Creator
{
    private static $faker;

    public static function random(): Generator
    {
        return self::faker();
    }

    private static function faker(): Generator
    {
        return self::$faker = self::$faker ?: self::generator();
    }

    private static function generator(): Generator
    {
        $faker = Factory::create();
        $faker->addProvider(new Person($faker));

        return $faker;
    }
}
