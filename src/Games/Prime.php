<?php

namespace BrainGames\Games\Prime;

use const BrainGames\Engine\MIN_FOR_RAND;
use const BrainGames\Engine\ROUNDS_COUNT;
use const BrainGames\Engine\MAX_FOR_RAND;

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }
    if ($num === 2) {
        return true;
    }
    if ($num % 2 === 0) {
        return false;
    }

    for ($i = 3; $i <= sqrt($num); $i += 2) {
        if ($num % $i === 0) {
            return false;
        }
    }
        return true;
}

function getGameData(): array
{
    $rounds = [];
    $desc = 'Answer "yes" if given number is prime. Otherwise answer "no"';

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num = random_int(MIN_FOR_RAND, MAX_FOR_RAND);
        $answer = isPrime($num) ? 'yes' : 'no';

        $rounds[$i]['question'] = (string)$num;
        $rounds[$i]['rightAnswer'] = $answer;
    }
    return [
        'desc' => $desc,
        'rounds' => $rounds,
    ];
}
