<?php

namespace App\Day9;

class GameFileLoader
{
    public function load(string $filepath, int $knotCount = 2): Game
    {
        $knot = null;

        for ($i = 1; $i <= $knotCount; $i++) {
            $knot = new Knot($knot);
        }

        return new Game($knot, file($filepath, FILE_IGNORE_NEW_LINES));
    }
}