<?php

namespace BrainGames\Engine;

use function cli\prompt;
use function cli\line;

const ROUNDS_COUNT = 3;
const MIN_FOR_RAND  = 1;
const MAX_FOR_RAND  = 100;

/**
 * @param string $desc Game description
 * @param array $rounds An array of rounds[$i] where each element is [‘question', ‘rightAnswer’,]
 * @return void
 */
function runGame(string $desc, array $rounds): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    line($desc);

    foreach ($rounds as $round) {
        line('Question: %s', $round['question']);
        $answer = prompt('Your answer');
        if ($round['rightAnswer'] === $answer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $round['rightAnswer']);
            line("Let's try again, $name!");
            exit();
        }
    }
    line('Congratulations, %s!', $name);
}
