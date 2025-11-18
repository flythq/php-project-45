<?php

namespace BrainGames\Games\Even;

use const BrainGames\Engine\MIN_FOR_RAND;
use const BrainGames\Engine\ROUNDS_COUNT;
use const BrainGames\Engine\MAX_FOR_RAND;

function getGameData(): array
{
    $rounds = [];
    $desc = "Answer 'yes' if the number is even, otherwise answer 'no'.";

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num = random_int(MIN_FOR_RAND, MAX_FOR_RAND);
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
