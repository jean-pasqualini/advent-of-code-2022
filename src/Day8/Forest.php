<?php

namespace App\Day8;

use Drawille\Canvas;
use PHP_Parallel_Lint\PhpConsoleColor\ConsoleColor;
use SebastianBergmann\CodeCoverage\Report\PHP;
use Wujunze\Colors;

class Forest
{
    public function __construct(private array $grid) {}

    /**
     * @return array
     */
    public function getGrid(): array
    {
        return $this->grid;
    }

    /**
     * @param int $x
     * @param int $y
     * @return array
     */
    private function getTreesAround(int $x, int $y): array
    {
        return [
            "up" => array_reverse(array_slice(array_column($this->grid, $x), 0, $y)),
            "down" => array_slice(array_column($this->grid, $x), $y + 1),
            "left" => array_reverse(array_slice($this->grid[$y], 0, $x)),
            "right" => array_slice($this->grid[$y], $x + 1),
        ];
    }

    private function directionsVisible(int $x, int $y): array
    {
        $treesAround = $this->getTreesAround($x, $y);

        $directionVisibles = [];
        foreach ($treesAround as $direction => $trees) {
            if (!empty(array_filter($trees, fn($tree) => $tree >= $this->grid[$y][$x]))) {
                $directionVisibles[$direction] = false;
                continue;
            }
            $directionVisibles[$direction] = true;
        }

        return $directionVisibles;
    }

    private function isTallest(int $x, int $y): bool
    {
        if ($x === 0 || $y === 0) {
            return true;
        }

        if ($x === count($this->grid[0]) - 1 || $y === count($this->grid) - 1) {
            return true;
        }

        return in_array(true, $this->directionsVisible($x, $y));
    }

    public function howManyTreesAreVisible(): int
    {
        $visibleTrees = 0;

        foreach ($this->grid as $y => $line) {
            foreach ($line as $x => $tree) {
               $visibleTrees += (int) $this->isTallest($x, $y);
            }
        }

        return $visibleTrees;
    }

    private function getScenicScore(int $x, int $y): int
    {
        if ($x === 0 || $y === 0) {
            return 0;
        }

        if ($x === count($this->grid[0]) - 1 || $y === count($this->grid) - 1) {
            return 0;
        }

        $treesAround = $this->getTreesAround($x, $y);

        $scenicScore = 1;
        foreach ($treesAround as $direction => $trees) {
            $directionScenicScore = 0;
            foreach ($trees as $tree) {
                $directionScenicScore += 1;
                if ($tree >= $this->grid[$y][$x]) {
                    break;
                }
            }
            $scenicScore *= $directionScenicScore;
        }

        return $scenicScore;
    }

    public function highestScenicScore(): int
    {
        $max = 0;

        foreach ($this->grid as $y => $line) {
            foreach ($line as $x => $tree) {
                $scenicScore = $this->getScenicScore($x, $y);
                if ($scenicScore > $max) {
                    $max = $scenicScore;
                }
            }
        }

        return $max;
    }

    public function debug(): string
    {
        $colors = new Colors();

        $content = "";
        foreach ($this->grid as $y => $line) {
            foreach ($line as $x => $tree) {
                if ($this->isTallest($x, $y)) {
                    $content .= $colors->getColoredString($tree, null,"cyan");
                } else {
                    $content .= $colors->getColoredString($tree, null,"purple");
                }
            }
            $content .= $colors->getColoredString(" ", null,"null");
            $content .= PHP_EOL;
        }

        return $content;
    }

    public function heatmap(): string
    {
        $canvas = new Canvas();

        $content = "";
        foreach ($this->grid as $y => $line) {
            foreach ($line as $x => $tree) {
                $canvas->set($x, $y);
            }
        }

        return $this->color($canvas->frame());
    }

    public function color(string $buffer): string
    {
        $colors = new ConsoleColor();
        $newBuffer = "";
        $bufferA = mb_str_split($buffer);

        foreach ($bufferA as $i => $bufferI) {
            $style = "bg_color_".(240 - $i);
            if ($i > 240) {
                $style = "bg_color_"."200";
            }
            $newBuffer .= $colors->apply($style, $bufferI);
        }

        return $newBuffer;
    }
}