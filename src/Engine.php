<?php

namespace BrainGames\Engine;

use function cli\prompt;
use function cli\line;

const ROUNDS = 3; // Количество раундов в игре

/**
 * @param string $desc Описание игры
 * @param array $rounds Массив из rounds[$i] где каждый элемент это ['question', 'rightAnswer']
 * @return void
 */
function playGame (string $desc, array $rounds): void
{

    //Приветствие
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    line($desc); // Вывод описания игры

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
