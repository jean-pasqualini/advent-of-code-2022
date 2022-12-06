<?php

namespace Day4;

use App\Day4\Team;
use PHPUnit\Framework\TestCase;


class TeamTest extends TestCase
{
    public function provideIsFullyOverlapping()
    {
        return [
            [['2-4', '6-8'], false],
            [['2-3', '4-5'], false],
            [['5-7', '7-9'], false],
            [['2-8', '3-7'], true],
            [['6-6', '4-6'], true],
            [['2-6', '4-8'], false],
        ];
    }

    public function provideIsOverlapping()
    {
        return [
            [['2-4', '6-8'], false],
            [['2-3', '4-5'], false],
            [['5-7', '7-9'], true],
            [['2-8', '3-7'], true],
            [['6-6', '4-6'], true],
            [['2-6', '4-8'], true],
        ];
    }

    /**
     * @dataProvider provideIsFullyOverlapping
     */
    public function testIsFullyOverlapping(array $assignements, bool $expected)
    {
        $this->assertEquals($expected, (new Team($assignements))->isFullyOverlapping());
    }

    /**
     * @dataProvider provideIsOverlapping
     */
    public function testIsOverlapping(array $assignements, bool $expected)
    {
        $this->assertEquals($expected, (new Team($assignements))->isOverlapping());
    }
}