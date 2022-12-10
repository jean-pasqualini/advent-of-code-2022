<?php

namespace App\Day10;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day10 extends Command
{
    protected static $defaultName = "day10";

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("hello");

        $lines = file(__DIR__."/input.txt", FILE_IGNORE_NEW_LINES);

        $registerX = 1;

        $lateInstruction = [];
        $cycle = 1;

        $cyclesCalcul = [20, 60, 100, 140, 180, 220];
        $calculs = [];

        foreach ($lines as $line) {
            if (in_array($cycle, $cyclesCalcul)) {
                echo "cycle n°".$cycle." : ".$registerX.PHP_EOL;
                $calculs[] = $registerX;
            }
            $arguments = explode(" ", $line);
            if (isset($lateInstruction[$cycle])) {
                $registerX += $lateInstruction[$cycle];
                unset($lateInstruction[$cycle]);
            }
            if ("addx" === $arguments[0]) {
                $lateInstruction[$cycle+2] = intval($arguments[1]);
            }
            $cycle++;
        }

        return 0;
    }
}