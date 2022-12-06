<?php

namespace Day4;

use App\Day4\TeamFileLoader;
use PHPUnit\Framework\TestCase;

class TeamFileLoaderTest extends TestCase
{
    public function testLoadStrategy1()
    {
        $loader = new TeamFileLoader();
        $teamCollection = $loader->loadStrategy1(__DIR__.'/input-part1.txt');
        $this->assertCount(6, $teamCollection);
        $firstTeam = $teamCollection[0];
        $this->assertEquals([
            [2,3,4],
            [6,7,8],
        ], $firstTeam->getAssigments());
    }
}