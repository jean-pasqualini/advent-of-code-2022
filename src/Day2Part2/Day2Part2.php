<?php

namespace App\Day2Part2;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Left:
 * - A: Rock
 * - B: Paper
 * - C: Scissors
 * Right:
 * - X: Lose
 * - Y: Draw
 * - Z: Win
 *
 * Weight:
 * - Rock: 1
 * - Paper: 2
 * - Scissors : 3
 *
 * Outcome:
 * - Lost: 0
 * - Draw: 3
 * - Win: 6
 */

class Day2Part2 extends Command {

    private const HANDOBJECT = [
        "A" => HandObject::ROCK,
        "B" => HandObject::PAPER,
        "C" => HandObject::SCISSORS,
    ];

    private const EXPECT_OUTCOME = [
        "X" => Outcome::LOST,
        "Y" => Outcome::DRAW,
        "Z" => Outcome::WIN,
    ];

    public static $defaultName = "day2part2";

    private function getRounds(): \Iterator
    {
        $lines = file(__DIR__."/../../resources/day-2.txt", FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            list($left, $right) = explode(" ", $line);

            yield new RockPaperScissorsRound(self::HANDOBJECT[$left], self::EXPECT_OUTCOME[$right]);
        }
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $symfonyStyle = new SymfonyStyle($input, $output);

        $symfonyStyle->note("hello");

        $rounds = $this->getRounds();
        $score = 0;

        foreach ($rounds as $round) {
            /**
             * @var RockPaperScissorsRound $round
             */
            $score+= $round->score();
        }

        $symfonyStyle->note(sprintf("score: %d", $score));

        return 0;
    }
}