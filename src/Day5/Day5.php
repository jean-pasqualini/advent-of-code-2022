<?php

namespace App\Day5;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day5 extends Command
{
    protected static $defaultName = 'day5';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('hello');

        $this->part1($output);
        $this->part2($output);

        return 0;
    }

    private function part1(OutputInterface $output)
    {
        $output->writeln("<info>PART 1</info>");
        $loader = new GameFileLoader();

        $game = $loader->loadGame(__DIR__.'/../../resources/day-5-board.txt');
        $player = $loader->loadPlayer(__DIR__.'/../../resources/day-5-player.txt', $game);

        while (($turn = $player->playTurn($game)) !== null) {
            $output->writeln($turn);
        }

        $output->writeln($game->humanReadableBoard(20));
    }

    private function part2(OutputInterface $output)
    {
        $output->writeln("<info>PART 2</info>");
        $loader = new GameFileLoader();

        $game = $loader->loadGame(__DIR__.'/../../resources/day-5-board.txt');
        $player = $loader->loadPlayer(__DIR__.'/../../resources/day-5-player.txt', $game);

        while (($turn = $player->playTurn($game, true)) !== null) {
            $output->writeln($turn);
        }

        $output->writeln($game->humanReadableBoard(20));
    }
}