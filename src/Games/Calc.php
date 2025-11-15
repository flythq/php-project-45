<?php

namespace BrainGames\Games\Calc;

use const BrainGames\Engine\ROUNDS;

function getData() : array
{
    $rounds = [];
    $desc = 'What is the result of the expression?';
    $operations = ['+', '-', '*'];


    for ($i = 0; $i < ROUNDS; $i++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $randomKey = array_rand($operations);
        $operation = $operations[$randomKey];


        $answer = match ($operation) {
            "+" => $num1 + $num2,
            "-" => $num1 - $num2,
            "*" => $num1 * $num2,
        };

        $rounds[$i]['question'] = "$num1 $operation $num2";
        $rounds[$i]['rightAnswer'] = (string)$answer;
    }
    return [
        'desc' => $desc,
        'rounds' => $rounds,
    ];
}
