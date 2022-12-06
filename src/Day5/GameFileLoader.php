<?php

namespace App\Day5;

class GameFileLoader
{
    public function loadGame(string $filepath): Game
    {
        $lines = file($filepath, FILE_IGNORE_NEW_LINES);
        $columnNames = array_pop($lines);
        $countColumns = count(explode("   ", $columnNames));

        $piles = array_fill(0, $countColumns, []);

        foreach ($lines as $line)
        {
            $columns = array_filter(array_map('trim', array_map(fn($chunk) => join('', $chunk), array_chunk(str_split($line), 4))), fn($item) => !empty($item));
            foreach ($columns as $position => $value) {
                $piles[$position][] = $value;
            }
        }

        foreach ($piles as $index => $pile) {
            $piles[$index] = array_reverse($pile);
        }


        return new Game($piles);
    }

    public function loadPlayer(string $filepath): Player
    {
        $lines = file($filepath, FILE_IGNORE_NEW_LINES);

        return new Player($lines);
    }
}