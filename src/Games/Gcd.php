<?php

namespace BrainGames\Games\Gcd;

use const BrainGames\Engine\MIN_FOR_RAND;
use const BrainGames\Engine\ROUNDS_COUNT;
use const BrainGames\Engine\MAX_FOR_RAND;

function getGcd(int $a, int $b): int
{
    if ($b === 0) {
        return $a;
    }
    return getGcd($b, $a % $b);
}
function getGameData(): array
{
    $rounds = [];
    $desc = "Find the greatest common divisor of given numbers.";

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num1 = rand(MIN_FOR_RAND, MAX_FOR_RAND);
        $num2 = rand(MIN_FOR_RAND, MAX_FOR_RAND);
        $answer = getGcd($num1, $num2);

        $rounds[$i]['question'] = "$num1 $num2";
        $rounds[$i]['rightAnswer'] = (string)$answer;
    }
    return [
        'desc' => $desc,
        'rounds' => $rounds,
    ];
}
