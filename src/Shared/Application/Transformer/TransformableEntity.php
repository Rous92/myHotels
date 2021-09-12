<?php

namespace MyHotels\Shared\Application\Transformer;

interface TransformableEntity
{
    public function write($data): self;

    public function read();
}
