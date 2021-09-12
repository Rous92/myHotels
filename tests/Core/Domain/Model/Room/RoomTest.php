<?php

namespace MyHotels\Tests\Core\Domain\Model\Room;

use MyHotels\Tests\Core\Domain\Model\Room\Mother\RoomMother;
use MyHotels\Tests\Core\Infrastructure\PHPUnit\CoreUnitTestCase;

class RoomTest extends CoreUnitTestCase
{
    public function testItShouldCompareIdentity(): void
    {
        $room = RoomMother::create();
        $otherHotel = RoomMother::create($room->id());
        $anotherHotel = RoomMother::create();

        $this->assertTrue($room->equals($otherHotel));
        $this->assertFalse($room->equals($anotherHotel));
    }
}
