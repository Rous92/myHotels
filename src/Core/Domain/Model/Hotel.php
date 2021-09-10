<?php

namespace MyHotels\Core\Domain\Model;

use MyHotels\Shared\Domain\Model\Entity;

class Hotel implements Entity
{
    public function __construct(
        private string $id,
        private string $name
    )
    {
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function equals(Entity $other): bool
    {
        // TODO
        return true;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }

    public function toJson(): string
    {
       return json_encode($this->toArray());
    }
}