<?php

namespace App\Day1;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class Day1 extends Command {

    public static $defaultName = "day1";

    /**
     * @param array $content
     * @return array
     */
    private function getBags(array $content): array {
        $calorieBags = [];
        $calories = 0;
        foreach ($content as $item) {
            if (PHP_EOL === $item) {
                $calorieBags[] = $calories;
                $calories = 0;
            } else {
                $calories += (int) $item;
            }
        }
        rsort($calorieBags);
        return $calorieBags;
    }

    private function sumTopFeeders(array $bags, int $count)
    {
        return array_sum(array_slice($bags, 0, $count));
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $symfonyStyle = new SymfonyStyle($input, $output);

        $bags = $this->getBags(file(__DIR__."/../../resources/day-1.txt"));

        $symfonyStyle->success(sprintf("There is %d calories in the top one", $this->sumTopFeeders($bags, 1)));
        $symfonyStyle->success(sprintf("There is %d calories in the top three", $this->sumTopFeeders($bags, 3)));

        return 0;
    }
}