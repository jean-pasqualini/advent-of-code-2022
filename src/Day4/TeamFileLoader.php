<?php

namespace App\Day4;

class TeamFileLoader
{
    /**
     * @return array<Team>
     */
    public function loadStrategy1(string $filepath): array {
        $lines = file($filepath, FILE_IGNORE_NEW_LINES);

        return array_map(fn($line) => new Team(explode(',', $line)), $lines);
    }
}