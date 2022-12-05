<?php

namespace Tests\Day3;

use App\Day3\Backpack;
use App\Day3\BackpackFileLoader;
use PHPUnit\Framework\TestCase;

class BackpackFileLoaderTest extends TestCase
{
    public function testLoad()
    {
        $loader = new BackpackFileLoader();
        /** @var array<Backpack> $backpacks */
        $backpacks = $loader->loadStrategy1(__DIR__.'/bagback.txt');
        $this->assertCount(6, $backpacks);
        $this->assertInstanceOf(Backpack::class, $backpacks[0]);
        $this->assertEquals('vJrwpWtwJgWr', join('', $backpacks[0]->getCompartments()[0]));
        $this->assertEquals('hcsFMMfFFhFp', join('', $backpacks[0]->getCompartments()[1]));
    }
}