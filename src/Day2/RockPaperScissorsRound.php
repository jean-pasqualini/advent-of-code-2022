<?php

namespace App\Day2;

class RockPaperScissorsRound
{
    private HandObject $left;
    private HandObject $right;

    public const ROCK = "ROCK";
    public const PAPER = "PAPER";
    public const SCISSORS = "SCISSORS";

    public const PLAYER_LEFT = 1;
    public const PLAYER_RIGHT = 2;

    private const WEIGHT = [
        "ROCK" => 1,
        "PAPER" => 2,
        "SCISSORS" => 3,
        "LOST" => 0,
        "DRAW" => 3,
        "WIN" => 6,
    ];

    private const WINNING_HANDS = [
        self::SCISSORS."|".self::PAPER,
        self::PAPER."|".self::ROCK,
        self::ROCK."|".self::SCISSORS,
    ];

    public function __construct(HandObject $left, HandObject $right) {
        $this->left = $left;
        $this->right = $right;
    }


    private function outcome(Player $player): Outcome
    {
        if ($this->left == $this->right) {
            return Outcome::DRAW;
        }

        $hand = $this->getObject($player)->name."|".$this->getOppositeObject($player)->name;

        if (in_array($hand, self::WINNING_HANDS)) {
            return Outcome::WIN;
        }


        return Outcome::LOST;
    }

    private function getObject(Player $player): HandObject
    {
        return $player === self::PLAYER_LEFT ? $this->left : $this->right;
    }

    private function getOppositeObject(Player $player): HandObject
    {
        return $player === self::PLAYER_LEFT ? $this->right : $this->left;
    }

    public function score(Player $player): int
    {
        return self::WEIGHT[$this->getObject($player)->name] + self::WEIGHT[$this->outcome($player)->name];
    }
}