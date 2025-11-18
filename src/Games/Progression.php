<?php

namespace BrainGames\Games\Progression;

use const BrainGames\Engine\MIN_FOR_RAND;
use const BrainGames\Engine\ROUNDS_COUNT;
use const BrainGames\Engine\MAX_FOR_RAND;

const MAX_FOR_PROGRESSION_START = 20;
const MAX_FOR_PROGRESSION_STEP = 10;
const MIN_FOR_PROGRESSION_LEN = 5;
const MAX_FOR_PROGRESSION_LEN = 10;

function getProgression(int $start, int $step, int $len): array
{
    $result = [];

    for ($i = 1; $i <= $len; $i++) {
        $result[] = $start + ($i * $step);
    }
    return $result;
}

function getGameData(): array
{
    $rounds = [];
    $desc = "What number is missing in the progression?";

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $start = rand(MIN_FOR_RAND, MAX_FOR_PROGRESSION_START);
        $step = rand(MIN_FOR_RAND, MAX_FOR_PROGRESSION_STEP);
        $len = rand(MIN_FOR_PROGRESSION_LEN, MAX_FOR_PROGRESSION_LEN);

        $progression = getProgression($start, $step, $len);
        $index = array_rand($progression);
        $answer = $progression[$index];
        $progression[$index] = '..';

        $rounds[$i]['question'] = implode(" ", $progression);
        $rounds[$i]['rightAnswer'] = (string)$answer;
    }
    return [
        'desc' => $desc,
        'rounds' => $rounds,
    ];
}
