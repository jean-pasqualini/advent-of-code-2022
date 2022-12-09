<?php

namespace Day8;
use App\Day8\Forest;
use PHPUnit\Framework\TestCase;

class ForestTest extends TestCase
{
    public function testHowManyTreesAreVisible()
    {
        $forest = new Forest([
            [3,0,3,7,3],
            [2,5,5,1,2],
            [6,5,3,3,2],
            [3,3,5,4,9],
            [3,5,3,9,0],
        ]);

        //echo $forest->debug();

        $this->assertEquals(21, $forest->howManyTreesAreVisible());
    }

    public function testHighestScenicScore()
    {
        $forest = new Forest([
            [3,0,3,7,3],
            [2,5,5,1,2],
            [6,5,3,3,2],
            [3,3,5,4,9],
            [3,5,3,9,0],
        ]);

        $this->assertEquals(8, $forest->highestScenicScore());
    }
}