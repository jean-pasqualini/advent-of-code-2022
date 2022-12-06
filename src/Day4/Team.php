<?php

namespace App\Day4;

class Team
{
    private $assignments = [];

    public function __construct(array $assignments)
    {
        foreach ($assignments as $assignment) {
            list($start, $end) = explode('-', $assignment);
            $this->assignments[] = range($start, $end);
        }
    }

    public function getAssigments()
    {
        return $this->assignments;
    }

    public function isFullyOverlapping()
    {
        // First the shortest array
        usort($this->assignments, fn($a, $b) => count($a) - count($b));
        // Compare the shortest array with other, if all of its items are included in the other, so we have an overlapping
        $diff = array_diff($this->assignments[0], ...array_slice($this->assignments, 1));
        return count($diff) === 0;
    }

    public function isOverlapping()
    {
        // First the shortest array
        usort($this->assignments, fn($a, $b) => count($a) - count($b));
        // Compare the shortest array with other, if all of its items are included in the other, so we have an overlapping
        $diff = array_diff($this->assignments[0], ...array_slice($this->assignments, 1));

        return count($diff) < count($this->assignments[0]);
    }
}