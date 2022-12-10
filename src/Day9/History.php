<?php

namespace App\Day9;

class History
{
    private static array $moves = [];

    private static int $cursor = 0;

    public static function recordMode()
    {
        self::$cursor = 0;
        self::$moves = [];
    }

    public static function compareMode()
    {
        self::$cursor = 0;
    }

    public static function record(Move $move)
    {
        self::$moves[] = $move;
        self::$cursor++;
    }

    public static function isSame(Move $move)
    {
        $currentCursor = self::$cursor;
        self::$cursor++;

        return $move->isSame(self::$moves[$currentCursor]);
    }
}