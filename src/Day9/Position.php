<?php

namespace App\Day9;

use PhpParser\PrettyPrinter\Standard;

class Position
{
    private int $x = 0;
    private int $y = 0;

    public const MOVE_RIGHT = [1,0];
    public const MOVE_LEFT = [-1,0];
    public const MOVE_UP = [0,-1];
    public const MOVE_DOWN = [0,1];

    private $direction;

    public function getX(): int {
        return $this->x;
    }

    public function getY(): int {
        return $this->y;
    }

    public function move(array $movement, $count) {
        $this->x += $movement[0] * $count;
        $this->y += $movement[1] * $count;
        $this->direction = $movement;
    }

    /**
     * @return mixed
     */
    public function getDirection()
    {
        return $this->direction;
    }

    public function getDistance(Position $head)
    {
        return new Distance($head->getX() - $this->getX(), $head->getY() - $this->getY());
    }

    public function apply(Move $move) {
        $this->x += $move->x;
        $this->y += $move->y;
    }

    public function realign(Position $head)
    {
        // -2 -1 +0 +1 +2 : -3
        // -2 -1 +0 +1 +2 : -2
        // -2 -1 +0 +1 +2 : -1
        // -2 -1 +0 +1 +2 : +0
        // -2 -1 +0 +1 +2 : +1
        // -2 -1 +0 +1 +2 : +2
        // -2 -1 +0 +1 +2 : +3

        $distance = $this->getDistance($head);

        if (!$distance->inRange()) {
            $this->apply($distance->getMove());
        }
    }

    public function __toString(): string
    {
        return str_pad($this->x.";".$this->y, 10, " ");
    }
}