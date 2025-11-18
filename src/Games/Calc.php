<?php

namespace BrainGames\Games\Calc;

use const BrainGames\Engine\MIN_FOR_RAND;
use const BrainGames\Engine\ROUNDS_COUNT;
use const BrainGames\Engine\MAX_FOR_RAND;

function getGameData(): array
{
    $rounds = [];
    $desc = 'What is the result of the expression?';
    $operators = ['+', '-', '*'];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num1 = rand(MIN_FOR_RAND, MAX_FOR_RAND);
        $num2 = rand(MIN_FOR_RAND, MAX_FOR_RAND);
        $randomKey = array_rand($operators);
        $operator = $operators[$randomKey];

        $answer = match ($operator) {
            "+" => $num1 + $num2,
            "-" => $num1 - $num2,
            "*" => $num1 * $num2,
        };

        $rounds[$i]['question'] = "$num1 $operator $num2";
        $rounds[$i]['rightAnswer'] = (string)$answer;
    }
    return [
        'desc' => $desc,
        'rounds' => $rounds,
    ];
}
