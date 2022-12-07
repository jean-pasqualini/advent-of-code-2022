<?php

namespace App\Day7;

use PhpParser\Node\Scalar\MagicConst\Dir;
use SebastianBergmann\CodeCoverage\Report\PHP;

class TreeFileLoader
{
    public function load(string $filepath): Directory
    {
        $lines = file($filepath, FILE_IGNORE_NEW_LINES);

        $currentDirectoryPath = [];

        /** @var Directory $currentDirectory */
        $currentDirectory = null;

        foreach ($lines as $line) {
            $lineParts = explode(" ", $line);
            if ("$" === $lineParts[0]) {
                switch ($lineParts[1]) {
                    case "cd":
                        if (null === $currentDirectory) {
                            $currentDirectory = new Directory($lineParts[2]);
                        } else {
                            if (".." === $lineParts[2]) {
                                $currentDirectory = $currentDirectory->getParent();

                                array_pop($currentDirectoryPath);
                            } else {
                                $newDirectory = new Directory($lineParts[2], $currentDirectory);
                                $currentDirectory->addChildren($newDirectory);
                                $currentDirectory = $newDirectory;

                                $currentDirectoryPath[] = $lineParts[2];
                            }

                        }
                    break;
                }
            } elseif("dir" === $lineParts[0]) {
            } else {
                $currentDirectory->addChildren(new File($lineParts[1], intval($lineParts[0])));
            }
        }

        return $currentDirectory->getRoot();
    }
}