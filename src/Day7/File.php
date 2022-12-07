<?php

namespace App\Day7;

class File implements ItemInterface
{
    public function __construct(private string $name, private int $size) {}

    public function getSize(): int
    {
        return $this->size;
    }

    public function getName(): string
    {
        return $this->name;
    }
}