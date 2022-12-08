<?php

namespace Day8;

use App\Day8\ForestFileLoader;
use PHPUnit\Framework\TestCase;

class ForestFileLoaderTest extends TestCase
{
    public function testLoad()
    {
        $loader = new ForestFileLoader();
        $forest = $loader->load(__DIR__.'/forest.txt');
        $this->assertEquals([
            [3,0,3,7,3],
            [2,5,5,1,2],
            [6,5,3,3,2],
            [3,3,5,4,9],
            [3,5,3,9,0],
        ], $forest->getGrid());
    }
}