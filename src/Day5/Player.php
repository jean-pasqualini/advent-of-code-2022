<?php

namespace App\Day5;

class Player
{
    private array $actions;

    public function __construct(array $actions)
    {
        $this->actions = $actions;
    }

    public function getActions(): array
    {
        return $this->actions;
    }

    public function playTurn(Game $game, bool $keepOrdering = false): ?string
    {
        $turn = array_shift($this->actions);
        if ($turn === null) {
            return $turn;
        }

        preg_match('/^move (?P<crates>[0-9]{1,2}) from (?P<from>[0-9]{1,2}) to (?P<to>[0-9]{1,2})$/i', $turn, $result);
        $game->move($result['crates'], $result['from'], $result['to'], $keepOrdering);

        return $turn;
    }
}