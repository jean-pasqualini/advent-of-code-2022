<?php

namespace Day9;

use App\Day9\Game;
use App\Day9\Map;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testPlay()
    {
        $map = new Map();
        $game = new Game($map, [
            "R 4",
            "U 4",
            "L 3",
            "D 1",
            "R 4",
            "D 1",
            "L 5",
            "R 2",
        ]);

        echo $game->playTurn().PHP_EOL;
    }
}