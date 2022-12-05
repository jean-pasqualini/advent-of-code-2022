<?php

namespace Day3;

use App\Day3\Backpack;
use PHPUnit\Framework\TestCase;

class BackpackTest extends TestCase
{
    public function getDataSet(): array
    {
        return [
           // [['vJrwpWtwJgWr', 'hcsFMMfFFhFp'], 16],
            [['wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn', 'ttgJtRGJQctTZtZT', 'CrZsJsPPZsGzwwsLwLmpwMDw'], 52],
        ];
    }

    /**
     * @dataProvider getDataSet
     * @return void
     */
    public function testCalculate(array $compartments, int $position)
    {

        $bagpack = new Backpack($compartments);
        $this->assertEquals($position, $bagpack->getPosition());
    }
}