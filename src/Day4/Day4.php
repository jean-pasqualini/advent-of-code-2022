<?php

namespace App\Day4;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day4 extends Command
{
    protected static $defaultName = 'day4';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('hello');

        $loader = new TeamFileLoader();

        $teamCollection = $loader->loadStrategy1(__DIR__.'/../../resources/day-4.txt');


        $countOverlap = 0;
        $countFullOverlap = 0;

        foreach ($teamCollection as $team)
        {
            $countFullOverlap += (int) $team->isFullyOverlapping();
            $countOverlap += (int) $team->isOverlapping();
        }

        $output->writeln(sprintf('count fully overlapping: %d', $countFullOverlap));
        $output->writeln(sprintf('count overlapping: %d', $countOverlap));

        return 0;
    }
}