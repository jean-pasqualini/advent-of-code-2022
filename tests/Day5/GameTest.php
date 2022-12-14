<?php

namespace Day5;

use App\Day5\GameFileLoader;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testPlayWithoutKeepOrdering()
    {
        $loader = new GameFileLoader();
        $game = $loader->loadGame(__DIR__.'/board.txt');
        $player = $loader->loadPlayer(__DIR__.'/player.txt');

       $player->playTurn($game);
        // 'move 1 from 2 to 1'
        $this->assertEquals(
            [
                ['[Z]', '[N]', '[D]'],
                ['[M]', '[C]'],
                ['[P]'],
            ],
            $game->getBoard()
        );

        $player->playTurn($game);

        // 'move 3 from 1 to 3'
        $this->assertEquals(
            [
                [],
                ['[M]', '[C]'],
                ['[P]', '[D]', '[N]', '[Z]'],
            ],
            $game->getBoard(),
        );

        $player->playTurn($game);
        // move 2 from 2 to 1',
        $this->assertEquals(
            [
                ['[C]', '[M]'],
                [],
                ['[P]', '[D]', '[N]', '[Z]'],
            ],
            $game->getBoard()
        );

        $player->playTurn($game);
        // 'move 1 from 1 to 2',
        $this->assertEquals(
            [
                ['[C]'],
                ['[M]'],
                ['[P]', '[D]', '[N]', '[Z]'],
            ],
            $game->getBoard()
        );
    }

    public function testPlayWithKeepOrdering()
    {
        $loader = new GameFileLoader();
        $game = $loader->loadGame(__DIR__.'/board.txt');
        $player = $loader->loadPlayer(__DIR__.'/player.txt');

        $player->playTurn($game, true);
        // 'move 1 from 2 to 1'
        $this->assertEquals(
            [
                ['[Z]', '[N]', '[D]'],
                ['[M]', '[C]'],
                ['[P]'],
            ],
            $game->getBoard(),
            $game->humanReadableBoard(5),
        );

        $player->playTurn($game, true);

        // 'move 3 from 1 to 3'
        $this->assertEquals(
            [
                [],
                ['[M]', '[C]'],
                ['[P]', '[Z]', '[N]', '[D]'],
            ],
            $game->getBoard(),
            $game->humanReadableBoard(5),
        );

        $player->playTurn($game, true);
        // move 2 from 2 to 1',
        $this->assertEquals(
            [
                ['[M]', '[C]'],
                [],
                ['[P]', '[Z]', '[N]', '[D]'],
            ],
            $game->getBoard(),
            $game->humanReadableBoard(5),
        );

        $player->playTurn($game, true);
        // 'move 1 from 1 to 2',
        $this->assertEquals(
            [
                ['[M]'],
                ['[C]'],
                ['[P]', '[Z]', '[N]', '[D]'],
            ],
            $game->getBoard(),
            $game->humanReadableBoard(5),
        );
    }
}