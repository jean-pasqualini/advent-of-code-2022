<?php

namespace Day5;

use App\Day5\GameFileLoader;
use PHPUnit\Framework\TestCase;

class GameFileLoaderTest extends TestCase
{
    public function testLoadBord()
    {
        $loader = new GameFileLoader();
        $board = $loader->loadGame(__DIR__.'/board.txt');
        $this->assertEquals([
            ["[N]", "[Z]"],
            ["[D]", "[C]", "[M]"],
            ["[P]"],
        ], $board->getBoard());
    }

    public function testLoadPlayer()
    {
        $loader = new GameFileLoader();
        $player = $loader->loadPlayer(__DIR__.'/player.txt');
        $this->assertEquals([
            'move 1 from 2 to 1',
            'move 3 from 1 to 3',
            'move 2 from 2 to 1',
            'move 1 from 1 to 2'
        ], $player->getActions());
    }
}