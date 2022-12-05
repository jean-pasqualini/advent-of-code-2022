<?php

namespace App\Day3;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day3 extends Command
{
    protected static $defaultName = "day3";

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('hello');

        $this->part1($output);
        $this->part2($output);

        return 0;
    }

    private function part1(OutputInterface $output) {
        $loader = new BackpackFileLoader();
        $backpacks = $loader->loadStrategy1(__DIR__.'/../../resources/day-3.txt');
        $sum = 0;
        /** @var array<Backpack> $backpacks */
        foreach ($backpacks as $backpack) {
            $sum += $backpack->getPosition();
        }

        $output->writeln(sprintf("Result : %d", $sum));
    }

    private function part2(OutputInterface $output) {
        $loader = new BackpackFileLoader();
        $backpacks = $loader->loadStrategy2(__DIR__.'/../../resources/day-3.txt');
        $sum = 0;
        /** @var array<Backpack> $backpacks */
        foreach ($backpacks as $backpack) {
            $sum += $backpack->getPosition();
        }

        $output->writeln(sprintf("Result : %d", $sum));
    }
}