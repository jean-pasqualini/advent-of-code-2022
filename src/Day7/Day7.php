<?php

namespace App\Day7;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day7 extends Command
{
    protected static $defaultName = "day7";

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("hello");

        $loader = new TreeFileLoader();
        $findSomeSpace = new FindSomeSpace();
        $rootDirectory = $loader->load(__DIR__.'/../../resources/day-7.txt');

        $output->writeln(sprintf("size part 1: %d", $findSomeSpace->part1($rootDirectory)));
        $output->writeln(sprintf("size part 2: %d", $findSomeSpace->part2($rootDirectory)));


        return 0;
    }
}