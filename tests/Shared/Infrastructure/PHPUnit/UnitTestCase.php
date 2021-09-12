<?php

namespace MyHotels\Tests\Shared\Infrastructure\PHPUnit;

use Faker\Factory;
use Mockery;
use Mockery\LegacyMockInterface;
use Mockery\MockInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class UnitTestCase extends TestCase
{
    public const FAKE_LOCALE = 'es_ES';
    protected $fake;

    protected function tearDown(): void
    {
        $this->fake = null;
    }

    protected function fake()
    {
        return $this->fake = $this->fake ?: Factory::create(self::FAKE_LOCALE);
    }

    protected function mock($className): MockObject
    {
        return $this->createMock($className);
    }

    protected function mockery($className): MockInterface|LegacyMockInterface
    {
        return Mockery::mock($className);
    }
}
