<?php

namespace App\Day9;

use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class Day9Test extends Command
{
    protected static $defaultName = "day9test";

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $loader = new GameFileLoader();
        $game = $loader->load(__DIR__.'/../../tests/Day9/input.txt', 8);

        if ($output instanceof ConsoleOutputInterface) {
            $sectionGame = $output->section();
            $sectionResult = $output->section();
            $symfonyStyleResult = new SymfonyStyle($input, $sectionResult);
            $sectionResult->clear(100);
            do {
                $sectionGame->write($game->debug());
                $symfonyStyleResult->table(
                    ['how many positions the tail has been ?'],
                    [[$game->getPart1()]]
                );
                sleep(1);
                $sectionGame->clear(100);
                $sectionResult->clear();
            } while (null !== $game->playTurn());
        }

        return 0;
    }
}