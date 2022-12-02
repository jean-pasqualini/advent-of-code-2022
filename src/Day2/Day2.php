<?php

namespace App\Day2;

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
 * - X: Rock
 * - Y: Paper
 * - Z: Scissors
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

class Day2 extends Command {

    private const LEFT = [
        "A" => HandObject::ROCK,
        "B" => HandObject::PAPER,
        "C" => HandObject::SCISSORS,
    ];
    private const RIGHT = [
        "X" => HandObject::ROCK,
        "Y" => HandObject::PAPER,
        "Z" => HandObject::SCISSORS,
    ];

    public static $defaultName = "day2";

    private function getRounds(): \Iterator
    {
        $lines = file(__DIR__."/../../resources/day-2.txt", FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            list($left, $right) = explode(" ", $line);

            yield new RockPaperScissorsRound(self::LEFT[$left], self::RIGHT[$right]);
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
            $score+= $round->score(Player::RIGHT);
        }

        $symfonyStyle->note(sprintf("score: %d", $score));

        return 0;
    }
}