<?php

namespace App\Day3;

class BackpackFileLoader
{
    public function loadStrategy1(string $filepath): array
    {
        $backpacks = [];
        $lines = file($filepath, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $splitPosition = strlen($line) / 2;
            $left = substr($line, 0, $splitPosition);
            $right = substr($line, $splitPosition);

            $backpacks[] = new Backpack([$left, $right]);
        }

        return $backpacks;
    }

    public function loadStrategy2(string $filepath): array
    {
        $lines = file($filepath, FILE_IGNORE_NEW_LINES);
        return array_map(fn($compartments) => new Backpack($compartments), array_chunk($lines, 3));
    }
}