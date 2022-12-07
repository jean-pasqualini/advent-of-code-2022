<?php

namespace App\Day7;

use PhpParser\Node\Scalar\MagicConst\Dir;

class FindSomeSpace
{
    public function part1(Directory $directory): int {

        $size = 0;

        foreach ($directory->getDirectories() as $directory) {
            $directorySize = $directory->getSize();
            $size += $this->part1($directory);
            if ($directorySize <= 100000) {
                $size += $directorySize;
            }
        }

        return $size;
    }
    public function part2(Directory $rootDirectory): int
    {
        $rootSize = $rootDirectory->getSize();
        $freeSpace = 70000000 - $rootSize;
        $freeSpaceRequiredToUpdate = 30000000 - $freeSpace;

        $sizeCollection = $this->sizeCollection($rootDirectory);
        $sizeCollection[] = $rootSize;
        $sizeCollection = array_filter($sizeCollection, fn(int $size) => $size >= $freeSpaceRequiredToUpdate);

        sort($sizeCollection);
        return $sizeCollection[0];
    }

    public function sizeCollection(Directory $currentDirectory): array
    {
        $sizeCollection = [];
        foreach ($currentDirectory->getDirectories() as $directory) {
            array_push($sizeCollection, $directory->getSize());
            array_push($sizeCollection, ...$this->sizeCollection($directory));
        }
        return $sizeCollection;
    }


}