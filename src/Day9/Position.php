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
    private Knot $knot;

    public function __construct(Knot $knot)
    {
        $this->knot = $knot;
    }

    /**
     * @return Knot
     */
    public function getKnot(): Knot
    {
        return $this->knot;
    }

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

    public function apply(Move $move) {
        $this->x += $move->x;
        $this->y += $move->y;
    }

    public function realign(Position $head, Strategy $strategy)
    {
        // -2 -1 +0 +1 +2 : -3
        // -2 -1 +0 +1 +2 : -2
        // -2 -1 +0 +1 +2 : -1
        // -2 -1 +0 +1 +2 : +0
        // -2 -1 +0 +1 +2 : +1
        // -2 -1 +0 +1 +2 : +2
        // -2 -1 +0 +1 +2 : +3

        if ($strategy === Strategy::MIX) {
            if (!$this->isInRange($head)) {
                $this->direction = $head->getDirection();
                switch ($head->getDirection()) {
                    case self::MOVE_UP:
                        $this->y -= 1;
                        // Diagonale check
                        if ($this->getX() < $head->getX()) {
                            $this->x += 1;
                        } elseif ($this->getX() > $head->getX()) {
                            $this->x -= 1;
                        }
                        break;
                    case self::MOVE_DOWN:
                        $this->y += 1;
                        // Diagonale check
                        if ($this->getX() < $head->getX()) {
                            $this->x += 1;
                        } elseif ($this->getX() > $head->getX()) {
                            $this->x -= 1;
                        }
                        break;
                    case self::MOVE_LEFT:
                        $this->x -= 1;
                        // Diagonale check
                        if ($this->getY() < $head->getY()) {
                            $this->y += 1;
                        } elseif ($this->getY() > $head->getY()) {
                            $this->y -= 1;
                        }
                        break;
                    case self::MOVE_RIGHT:
                        $this->x += 1;
                        // Diagonale check
                        if ($this->getY() < $head->getY()) {
                            $this->y += 1;
                        } elseif ($this->getY() > $head->getY()) {
                            $this->y -= 1;
                        }
                        break;
                }
            }
        } elseif ($strategy === Strategy::CLEO) {
            if ($this->getY() + 2 === $head->getY()) {
                if ($this->getX() < $head->getX()) {
                    $this->apply(new Move(x: +1, y: +1));
                } elseif ($this->getX() > $head->getX()) {
                    $this->apply(new Move(x: -1, y: +1));
                } else {
                    $this->apply(new Move(x: 0, y: +1));
                }
            }

            if ($this->getX() + 2 === $head->getX()) {
                if ($this->getY() < $head->getY()) {
                    $this->apply(new Move(x: +1, y: +1));
                } elseif ($this->getY() > $head->getY()) {
                    $this->apply(new Move(x: +1, y: -1));
                } else {
                    $this->apply(new Move(x: +1, y: 0));
                }
            }

            if ($this->getY() - 2 === $head->getY()) {
                if ($this->getX() < $head->getX()) {
                    $this->apply(new Move(x: +1, y: -1));
                } elseif ($this->getX() > $head->getX()) {
                    $this->apply(new Move(x: -1, y: -1));
                } else {
                    $this->apply(new Move(x: 0, y: -1));
                }
            }

            if ($this->getX() - 2 === $head->getX()) {
                if ($this->getY() < $head->getY()) {
                    $this->apply(new Move(x: -1, y: +1));
                } elseif ($this->getY() > $head->getY()) {
                    $this->apply(new Move(x: -1, y: -1));
                } else {
                    $this->apply(new Move(x: -1, y: 0));
                }
            }
        }
    }

    public function __toString(): string
    {
        return str_pad($this->x.";".$this->y, 10, " ");
    }
}