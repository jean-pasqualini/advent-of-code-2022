<?php

namespace Day9;

use App\Day9\Game;
use App\Day9\Knot;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\CodeCoverage\Report\PHP;

class GameTest extends TestCase
{
    public function testPlay()
    {
        $head = new Knot(null);
        new Knot($head);
        $game = new Game($head, [
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
        echo $game->playTurn().PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo $game->playTurn().PHP_EOL;

        $this->assertEquals(13, $game->getPart1());
    }

    public function testPlay3()
    {
        $head = new Knot(null);
        $body1 = new Knot($head);
        $body2 = new Knot($body1);
        $body3 = new Knot($body2);
        $body4 = new Knot($body3);
        $body5 = new Knot($body4);
        $body6 = new Knot($body5);
        $body7 = new Knot($body6);
        $body8 = new Knot($body7);
        $tail = new Knot($body8);

        $game = new Game($head, [
            "R 4",
            "U 2",
        ]);

        echo $game->debugMoinJolie();

        echo "============".PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo "============".PHP_EOL;
        echo $game->debugMoinJolie();

        echo PHP_EOL.PHP_EOL.PHP_EOL;

        echo "============".PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo "============".PHP_EOL;
        echo $game->debugMoinJolie();

        echo PHP_EOL.PHP_EOL.PHP_EOL;
    }

    public function testPlay2()
    {
        $head = new Knot(null);
        $body1 = new Knot($head);
        $body2 = new Knot($body1);
        $body3 = new Knot($body2);
        $body4 = new Knot($body3);
        $body5 = new Knot($body4);
        $body6 = new Knot($body5);
        $body7 = new Knot($body6);
        $body8 = new Knot($body7);
        $tail = new Knot($body8);
        $game = new Game($head, [
            "R 4",
            "U 4",
            "L 3",
            "D 1",
            "R 4",
            "D 1",
            "L 5",
            "R 2",
        ]);

        echo $game->debugMoinJolie();

        echo "============".PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo "============".PHP_EOL;
        echo $game->debugMoinJolie();

        echo PHP_EOL.PHP_EOL.PHP_EOL;

        echo "============".PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo "============".PHP_EOL;
        echo $game->debugMoinJolie();

        echo PHP_EOL.PHP_EOL.PHP_EOL;

        echo "============".PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo "============".PHP_EOL;
        echo $game->debugMoinJolie();

        echo PHP_EOL.PHP_EOL.PHP_EOL;

        echo "============".PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo "============".PHP_EOL;
        echo $game->debugMoinJolie();

        echo PHP_EOL.PHP_EOL.PHP_EOL;

        echo "============".PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo "============".PHP_EOL;
        echo $game->debugMoinJolie();

        echo PHP_EOL.PHP_EOL.PHP_EOL;

        echo "============".PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo "============".PHP_EOL;
        echo $game->debugMoinJolie();

        echo PHP_EOL.PHP_EOL.PHP_EOL;

        echo "============".PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo "============".PHP_EOL;
        echo $game->debugMoinJolie();

        echo PHP_EOL.PHP_EOL.PHP_EOL;

        echo "============".PHP_EOL;
        echo $game->playTurn().PHP_EOL;
        echo "============".PHP_EOL;
        echo $game->debugMoinJolie();

    }
}