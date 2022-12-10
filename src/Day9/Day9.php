<?php

namespace App\Day9;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day9 extends Command
{
    protected static $defaultName = "day9";

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->part1($output, Strategy::CLEO);
        $this->part1($output, Strategy::MIX);

        $this->part2($output, Strategy::CLEO);
        $this->part2($output, Strategy::MIX);

        return 0;
    }

    private function part1(OutputInterface $output, Strategy $strategy)
    {
        $loader = new GameFileLoader();
        $game = $loader->load(__DIR__.'/../../resources/day-9.txt');

        do {
        } while (null !== $game->playTurn($strategy));

        $output->writeln(sprintf("part 1 result with strategy %s: %d", $strategy->name, $game->getPart1()));
    }

    private function part2(OutputInterface $output, Strategy $strategy)
    {
        $loader = new GameFileLoader();
        $game = $loader->load(__DIR__.'/../../resources/day-9.txt', 10);

        do {
        } while (null !== $game->playTurn($strategy));

        $output->writeln(sprintf("part 2 result with strategy %s: %d", $strategy->name, $game->getPart1()));
    }
}