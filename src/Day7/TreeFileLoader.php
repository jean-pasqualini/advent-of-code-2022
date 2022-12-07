<?php

namespace App\Day7;

use PhpParser\Node\Scalar\MagicConst\Dir;
use SebastianBergmann\CodeCoverage\Report\PHP;

class TreeFileLoader
{
    public function load(string $filepath): Directory
    {
        $lines = file($filepath, FILE_IGNORE_NEW_LINES);

        /** @var Directory $currentDirectory */
        $currentDirectory = null;

        foreach ($lines as $line) {
            $lineParts = explode(" ", $line);
            if ("$" === $lineParts[0] && "cd" === $lineParts[1]) {
                if (null === $currentDirectory) {
                    $currentDirectory = new Directory($lineParts[2]);
                    continue;
                }

                if (".." === $lineParts[2]) {
                    $currentDirectory = $currentDirectory->getParent();
                    continue;
                }

                $currentDirectory = new Directory($lineParts[2], $currentDirectory);
            } elseif("$" !== $lineParts[0] && "dir" !== $lineParts[0]) {
                $currentDirectory->addChildren(new File($lineParts[1], intval($lineParts[0])));
            }
        }

        return $currentDirectory->getRoot();
    }
}