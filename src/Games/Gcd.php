<?php

namespace BrainGames\Games\Gcd;

use const BrainGames\Engine\ROUNDS;

/**
 * Наибольший общий делитель.
 * @param int $a
 * @param int $b
 * @return int
 */
function gcd(int $a, int $b): int
{
    if ($b === 0) {
        return $a;
    }
    return gcd($b, $a % $b);
}
function getData (): array
{

    $rounds = [];
    $desc = "Find the greatest common divisor of given numbers.";

    for ($i = 0; $i < ROUNDS; $i++) {

        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $answer = gcd($num1, $num2);

        $rounds[$i]['question'] = "$num1 $num2";
        $rounds[$i]['rightAnswer'] = (string)$answer;
    }
    return [
        'desc' => $desc,
        'rounds' => $rounds,
    ];
}
