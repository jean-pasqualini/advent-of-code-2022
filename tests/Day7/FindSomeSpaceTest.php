<?php

namespace Day7;

use App\Day7\Directory;
use App\Day7\File;
use App\Day7\FindSomeSpace;
use PHPUnit\Framework\TestCase;

class FindSomeSpaceTest extends TestCase
{
    public function testPart2()
    {
        $rootDirectory = new Directory("/");

        $aDirectory = new Directory("a", $rootDirectory);
        $rootDirectory->addChildren($aDirectory);

        $eDirectory = new Directory("e", $aDirectory);
        $aDirectory->addChildren($eDirectory);

        $dDirectory = new Directory("d", $rootDirectory);
        $rootDirectory->addChildren($dDirectory);


        $eDirectory->addChildren(new File("i", 584));
        $aDirectory->addChildren(new File("f", 29116));
        $aDirectory->addChildren(new File("g", 2557));
        $aDirectory->addChildren(new File("h.lst", 62596));
        $rootDirectory->addChildren(new File("b.txt", 14848514));
        $rootDirectory->addChildren(new File("c.txt", 8504156));
        $dDirectory->addChildren(new File("j", 4060174));
        $dDirectory->addChildren(new File("d.log", 8033020));
        $dDirectory->addChildren(new File("d.ext", 5626152));
        $dDirectory->addChildren(new File("k", 7214296));

        $findSomeSpace = new FindSomeSpace();
        $this->assertEquals(24933642, $findSomeSpace->part2($rootDirectory));
    }

    public function testPart1()
    {
        $rootDirectory = new Directory("/");

        $aDirectory = new Directory("a", $rootDirectory);
        $rootDirectory->addChildren($aDirectory);

        $eDirectory = new Directory("e", $aDirectory);
        $aDirectory->addChildren($eDirectory);

        $dDirectory = new Directory("d", $rootDirectory);
        $rootDirectory->addChildren($dDirectory);


        $eDirectory->addChildren(new File("i", 584));
        $aDirectory->addChildren(new File("f", 29116));
        $aDirectory->addChildren(new File("g", 2557));
        $aDirectory->addChildren(new File("h.lst", 62596));
        $rootDirectory->addChildren(new File("b.txt", 14848514));
        $rootDirectory->addChildren(new File("c.txt", 8504156));
        $dDirectory->addChildren(new File("j", 4060174));
        $dDirectory->addChildren(new File("d.log", 8033020));
        $dDirectory->addChildren(new File("d.ext", 5626152));
        $dDirectory->addChildren(new File("k", 7214296));

        $findSomeSpace = new FindSomeSpace();

        $this->assertEquals(95437, $findSomeSpace->part1($rootDirectory));
    }
}