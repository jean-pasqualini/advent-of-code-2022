<?php

namespace App\Day2Part2;

class RockPaperScissorsRound
{
    private HandObject $handObject;
    private Outcome $expectedOutcome;

    public const ROCK = "ROCK";
    public const PAPER = "PAPER";
    public const SCISSORS = "SCISSORS";

    private const WEIGHT = [
        self::ROCK => 1,
        self::PAPER => 2,
        self::SCISSORS => 3,
        "LOST" => 0,
        "DRAW" => 3,
        "WIN" => 6,
    ];

    private const WINNING_OBJECT = [
        self::PAPER => HandObject::SCISSORS,
        self::ROCK => HandObject::PAPER,
        self::SCISSORS => HandObject::ROCK,
    ];

    private const LOSTING_OBJECT = [
        self::SCISSORS => HandObject::PAPER,
        self::PAPER => HandObject::ROCK,
        self::ROCK => HandObject::SCISSORS,
    ];

    public function __construct(HandObject $handObject, Outcome $expectedOutcome) {
        $this->handObject = $handObject;
        $this->expectedOutcome = $expectedOutcome;
    }


    private function object(): HandObject
    {
        if ($this->expectedOutcome === Outcome::DRAW) {
            return $this->handObject;
        }

        if ($this->expectedOutcome === Outcome::WIN) {
            return self::WINNING_OBJECT[$this->handObject->name];
        }

        return self::LOSTING_OBJECT[$this->handObject->name];
    }

    public function score(): int
    {
        return self::WEIGHT[$this->object()->name] + self::WEIGHT[$this->expectedOutcome->name];
    }
}