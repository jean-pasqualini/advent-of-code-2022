<?php

namespace App\Day9;

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

    private function isInRange(Position $head): bool
    {
        $distanceX = $this->getX() - $head->getX();
        $distanceY = $this->getY() - $head->getY();

        // Same row
        if (($distanceX > 1 || $distanceX < -1) || ($distanceY > 1 || $distanceY < -1)) {
            return false;
        }
        return true;
    }

    public function realign(Position $head, $keepSecurityDistance = true)
    {
        // -2 -1 +0 +1 +2 : -3
        // -2 -1 +0 +1 +2 : -2
        // -2 -1 +0 +1 +2 : -1
        // -2 -1 +0 +1 +2 : +0
        // -2 -1 +0 +1 +2 : +1
        // -2 -1 +0 +1 +2 : +2
        // -2 -1 +0 +1 +2 : +3

        if (!$this->isInRange($head) || !$keepSecurityDistance) {
            $this->direction = $head->getDirection();
            switch ($head->getDirection()) {
                case self::MOVE_UP:
                    $this->x = $head->getX();
                    $this->y = $head->getY() + 1;
                    break;
                case self::MOVE_DOWN:
                    $this->x = $head->getX();
                    $this->y = $head->getY() - 1;
                    break;
                case self::MOVE_LEFT:
                    $this->x = $head->getX() + 1;
                    $this->y = $head->getY();
                    break;
                case self::MOVE_RIGHT:
                    $this->x = $head->getX() - 1;
                    $this->y = $head->getY();
                    break;
            }
        }
    }

    public function __toString(): string
    {
        return str_pad($this->x.";".$this->y, 10, " ");
    }
}