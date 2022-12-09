<?php

namespace App\Day9;

class Game
{
    private Map $map;
    private array $actions = [];

    public function __construct(Map $map, array $actions = [])
    {
        $this->map = $map;
        $this->actions = $actions;
    }

    /**
     * @return array
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    public function playTurn(): ?string
    {
        $turn = array_shift($this->actions);
        if ($turn === null) {
            return $turn;
        }

        return $turn;
    }
}