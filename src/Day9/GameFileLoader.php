<?php

namespace App\Day9;

class GameFileLoader
{
    public function load(string $filepath): Game
    {
        return new Game(new Map(), file($filepath, FILE_IGNORE_NEW_LINES));
    }
}