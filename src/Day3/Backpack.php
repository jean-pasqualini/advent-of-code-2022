<?php

namespace App\Day3;

class Backpack
{
    private array $compartments;
    private const RANGE = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    public function __construct(array $compartments) {
        $this->compartments = array_map('str_split', $compartments);
    }

    public function getCompartments() {
        return $this->compartments;
    }

    public function getPosition(): int {
        $expected = count($this->compartments) - 1;
        foreach ($this->compartments[0] as $item) {
            $got = 0;
            for ($i = 1; $i < count($this->compartments); $i++) {
                if (in_array($item, $this->compartments[$i])) {
                    $got++;
                }
            }

            if ($expected === $got) {
                return strpos(self::RANGE, $item) + 1;
            }
        }

        return 0;
    }
}