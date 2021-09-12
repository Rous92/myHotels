<?php

namespace MyHotels\Shared\Domain\Model;

interface Entity
{
    public function equals(Entity $other): bool;

    public function toArray(): array;

    public function toJson(): string;
}
