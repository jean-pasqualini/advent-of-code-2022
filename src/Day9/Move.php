<?php

namespace App\Day9;

class Move
{
    public int $x;

    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function isSame(Move $move)
    {
        return $this->x === $move->x && $this->y === $move->y;
    }
}