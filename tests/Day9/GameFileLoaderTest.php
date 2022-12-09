<?php

namespace Day9;

use App\Day9\GameFileLoader;
use PHPUnit\Framework\TestCase;

class GameFileLoaderTest extends TestCase {

    public function testLoad()
    {
        $loader = new GameFileLoader();
        $game = $loader->load(__DIR__.'/input.txt');

        $this->assertEquals([
            "R 4",
            "U 4",
            "L 3",
            "D 1",
            "R 4",
            "D 1",
            "L 5",
            "R 2",
        ], $game->getActions());
    }
}