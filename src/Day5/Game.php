<?php

namespace App\Day5;

class Game
{
    private array $piles;

    public function __construct(array $piles)
    {
        $this->piles = $piles;
    }

    public function getBoard(): array
    {
        return $this->piles;
    }

    public function humanReadableBoard($top = 10000): string {
        $lines = [];
        for ($i = $top; $i >= 0; $i--) {
            $line = [];
            foreach ($this->piles as $pile) {
                $line[] = $pile[$i] ?? "   ";
            }
            $lines[] = join(' ', $line);
        }

        $lines[] = str_repeat("=", 20).PHP_EOL;

        return join(PHP_EOL, $lines);
    }

    public function move(int $numCrates, int $from, int $to, bool $keepOrdering = false)
    {
        $from -= 1;
        $to -= 1;

        $crates = [];
        for ($i = 1; $i <= $numCrates; $i++) {
            $crate = array_pop($this->piles[$from]);
            $crates[] = $crate;
        }

        if ($keepOrdering === true) {
            $crates = array_reverse($crates);
        }

        foreach ($crates as $crate) {
            array_push($this->piles[$to], $crate);
        }
    }
}