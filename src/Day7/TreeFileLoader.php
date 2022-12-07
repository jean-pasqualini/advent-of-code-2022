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
            if ($this->isEnterDirectoryInstruction($lineParts)) {
                $currentDirectory = $this->enterDirectory($lineParts[2], $currentDirectory);
            } elseif($this->isFileInstruction($lineParts)) {
                $currentDirectory->addChildren(new File($lineParts[1], intval($lineParts[0])));
            }
        }

        return $currentDirectory->getRoot();
    }

    private function isEnterDirectoryInstruction($lineParts): bool
    {
        return "$" === $lineParts[0] && "cd" === $lineParts[1];
    }

    private function isFileInstruction($lineParts): bool
    {
        return "$" !== $lineParts[0] && "dir" !== $lineParts[0];
    }

    private function enterDirectory($directoryName, $currentDirectory): Directory
    {
        if (null === $currentDirectory) {
            return new Directory($directoryName);
        }

        if (".." === $directoryName) {
            return $currentDirectory->getParent();
        }

        return new Directory($directoryName, $currentDirectory);
    }
}