<?php

namespace App\Day9;

class Knot
{
    private ?Knot $follow = null;
    private ?Knot $followBy = null;

    private Position $position;

    private static $nameGenerator = 0;

    private int $name;

    private const DIRECTIONS = [
        "U" => Position::MOVE_UP,
        "D" => Position::MOVE_DOWN,
        "L" => Position::MOVE_LEFT,
        "R" => Position::MOVE_RIGHT,
    ];

    public function __construct(?Knot $follow)
    {
        self::$nameGenerator++;
        $this->name = self::$nameGenerator;

        $this->position = new Position($this);
        $this->follow = $follow;
        if (null !== $this->follow) {
            $this->follow->setFollowBy($this);
        }
    }

    public function setFollowBy(Knot $knot)
    {
        $this->followBy = $knot;
    }

    public function isHead(): bool
    {
        return $this->follow === null;
    }

    public function isTail(): bool
    {
        return $this->followBy === null;
    }

    public function getTail(): Knot
    {
        return $this->isTail() ? $this : $this->followBy->getTail();
    }

    public function getHead(): Knot
    {
        return $this->isHead() ? $this : $this->follow->getHead();
    }

    public function move($direction, $steps, Strategy $strategy) {
        $this->position->move(self::DIRECTIONS[$direction], $steps);
        $this->realign($strategy);
    }

    public function realign(Strategy $strategy) {
        if (null !== $this->follow) {
            $this->position->realign($this->follow->getPosition(), $strategy);
        }
        if (null !== $this->followBy) {
            $this->followBy->realign($strategy);
        }
    }

    public function getPosition(): Position
    {
        return $this->position;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNameByPosition(int $x, int $y): ?int {
        if ($this->getPosition()->getX() === $x && $this->getPosition()->getY() === $y) {
            return $this->name;
        }

        if (null !== $this->followBy) {
            return $this->followBy->getNameByPosition($x, $y);
        }

        return null;
    }
}