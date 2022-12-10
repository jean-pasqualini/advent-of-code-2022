<?php

namespace App\Day9;

use SebastianBergmann\CodeCoverage\Report\PHP;
use Wujunze\Colors;

class Game
{
    private Knot $head;
    private Knot $tail;

    private array $actions = [];

    private array $historyTailPositions;
    private array $historyHeadPositions;

    public function __construct(Knot $rope, array $actions)
    {
        $this->head = $rope->getHead();
        $this->tail = $rope->getTail();
        $this->actions = $actions;
        $this->historyHeadPositions = [(string) $this->head->getPosition()];
        $this->historyTailPositions = [(string) $this->tail->getPosition()];
    }

    /**
     * @return array
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    public function playTurn(): ?string
    {
        $turn = array_shift($this->actions);
        if ($turn === null) {
            return $turn;
        }

        list($direction, $steps) = explode(" ", $turn);

        for ($i = 1; $i <= $steps; $i++) {
            $this->head->move($direction, 1);
            $this->historyHeadPositions[] = (string) $this->head->getPosition();
            $this->historyTailPositions[] = (string) $this->tail->getPosition();
        }

        return $turn;
    }

    public function debugMoinJolie(): string {
        $content = "";
        for ($y = -10; $y<=10; $y++) {
            for ($x = -10; $x <= 10; $x++) {
                $number = $this->head->getNameByPosition($x, $y);

                if (null === $number) {
                    $content .= ".";
                } else {
                    $content .= $number === 1 ? "H" : $number - 1;
                }
            }
            $content .= PHP_EOL;
        }

        return $content;
    }

    public function debug(): string {
        $colors = new Colors();
        $content = "";
        for ($y = -10; $y<=10; $y++) {
            for ($x = -10; $x <= 10; $x++) {
                $number = $this->head->getNameByPosition($x, $y);

                $currentCheck = str_pad($x.";".$y, 10, " ");
                $bg = in_array($currentCheck, $this->historyTailPositions) ? "red" : "green";

                $mapDisplay = [
                    null => " .. ",
                    1 =>    " 1_ ",
                    2 =>    " 2_ ",
                    3 =>    " 3_ ",
                    4 =>    " 4_ ",
                    5 =>    " 5_ ",
                    6 =>    " 6_ ",
                    7 =>    " 7_ ",
                    8 =>    " 8_ ",
                    9 =>    " 9_ ",
                    10 =>   " 10 ",
                ];

                if (null === $number) {
                    $content .= $colors->getColoredString($mapDisplay[$number], null, $bg);
                } else {
                    $content .= $colors->getColoredString($mapDisplay[$number], null, $bg);
                }
            }
            $content .= PHP_EOL;
        }

        return $content;
    }

    public function clear(): string {
        system("clear");
        return "";
    }

    public function getPart1(): int
    {
        return count(array_unique($this->historyTailPositions));
    }

    public function getHistoryTailPositions(): array
    {
        return $this->historyTailPositions;
    }
    public function getHistoryHeadPositions(): array
    {
        return $this->historyHeadPositions;
    }
}