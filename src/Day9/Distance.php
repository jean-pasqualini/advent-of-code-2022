<?php

namespace App\Day9;

class Distance
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function inRange()
    {
        return !($this->x > 1 || $this->x < -1 || $this->y > 1 || $this->y < -1);
    }

    public function getMove(): Move
    {
        return new Move(
            x: $this->x !== 0 ? $this->x / abs($this->x) : 0,
            y: $this->y !== 0 ? $this->y / abs($this->y): 0
        );
    }
}