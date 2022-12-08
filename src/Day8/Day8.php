<?php

namespace App\Day8;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day8 extends Command
{
    protected static $defaultName = "day8";

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("hello");

        $loader = new ForestFileLoader();
        $forest = $loader->load(__DIR__."/../../resources/day-8.txt");

        $output->writeln($forest->debug());

        $output->writeln(sprintf("how many trees are visible ? %d", $forest->howManyTreesAreVisible()));
        $output->writeln(sprintf("highest scenic score ? %d", $forest->highestScenicScore()));


        return 0;
    }
}