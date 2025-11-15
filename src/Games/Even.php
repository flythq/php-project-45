<?php

namespace BrainGames\Games\Even;

use const BrainGames\Engine\ROUNDS;

/**
 * Логика игры Четное
 * @return array Данные для движка игры
 */
function getData (): array
{

    $rounds = [];
    $desc = "Answer 'yes' if the number is even, otherwise answer 'no'.";


    for ($i = 0; $i < ROUNDS; $i++) {

        $num = rand(1, 100);
        $even = ($num % 2 === 0);
        ($even === true) ? $correct = "yes" : $correct = "no";

        $rounds[$i]['question'] = $num;
        $rounds[$i]['rightAnswer'] = $correct;
    }
    return [
        'desc' => $desc,
        'rounds' => $rounds,
    ];
}