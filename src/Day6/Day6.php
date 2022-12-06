<?php

namespace App\Day6;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day6 extends Command
{
    protected static $defaultName = "day6";

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sniffer = new HandshakeMarkerSniffer();
        $stream = file_get_contents(__DIR__.'/../../resources/day-6.txt');
        $output->writeln(
            sprintf("position part 1: %d", $sniffer->sniff($stream, 4))
        );
        $output->writeln(
            sprintf("position part 2: %d", $sniffer->sniff($stream, 14))
        );

        return 0;
    }
}