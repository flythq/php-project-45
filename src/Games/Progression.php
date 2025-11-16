<?php

namespace BrainGames\Games\Progression;

use const BrainGames\Engine\ROUNDS;

function getProgression(int $start, int $step, int $len = 5): array
{
    $result = [];
    for ($i = 1; $i <= $len; $i++) {
        $result[] = $start + $i * $step;
    }
    return $result;
}

function getData (): array
{
    $rounds = [];
    $desc = "What number is missing in the progression?";

    for ($i = 0; $i < ROUNDS; $i++) {

        $start = rand(1, 20);
        $step = rand(1, 10);
        $len = rand(5, 10);

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