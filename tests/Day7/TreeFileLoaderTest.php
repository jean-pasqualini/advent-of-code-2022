<?php

namespace Day7;
use App\Day7\TreeFileLoader;
use PHPUnit\Framework\TestCase;

class TreeFileLoaderTest extends TestCase
{
    public function testLoad()
    {
        $loader = new TreeFileLoader();
        $directory = $loader->load(__DIR__.'/input.txt');

        $this->assertEquals("/", $directory->getName());
        $this->assertEquals(json_encode([
            'b.txt' => 14848514,
            'c.dat' => 8504156,
            'a' => [
                'f' => 29116,
                'g' => 2557,
                'h.lst' => 62596,
                'e' => [
                    'i' => 584,
                ]
            ],
            'd' => [
                'j' => 4060174,
                'd.log' => 8033020,
                'd.ext' => 5626152,
                'k' => 7214296,
            ]
        ]), json_encode($directory->tree()));
    }
}