<?php

namespace App\Day8;

class ForestFileLoader
{
    public function load(string $filepath): Forest
    {
        $lines = array_map('str_split', file($filepath, FILE_IGNORE_NEW_LINES));

        return new Forest($lines);
    }
}