<?php

namespace App\Day6;

class HandshakeMarkerSniffer
{
    public function sniff(string $stream, $expectedSize = 4): int {
        $sizeBuffer = 0;
        $cursor = 0;
        $buffer = "";
        for ($i = 0; $i < strlen($stream); $i++) {
            $sizeBuffer++;
            $cursor++;
            $buffer .= $stream[$i];
            if ($sizeBuffer >= $expectedSize) {
                $lastFourCharacters = str_split(substr($buffer, -$expectedSize, $expectedSize));
                if (count(array_count_values($lastFourCharacters)) == $expectedSize) {
                    return $i+1;
                }
            }
        }

        return 0;
    }
}