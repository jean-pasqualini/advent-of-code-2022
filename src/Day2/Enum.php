<?php

namespace App\Day2;

enum HandObject {
    case ROCK;
    case PAPER;
    case SCISSORS;
}

enum Player {
    case LEFT;
    case RIGHT;
}

enum Outcome {
    case WIN;
    case DRAW;
    case LOST;
}
