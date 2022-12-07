<?php

namespace App\Day7;

interface ItemInterface
{
    public function getSize(): int;

    public function getName(): string;
}