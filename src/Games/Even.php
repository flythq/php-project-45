<?php

/**
 * "Проверка на чётность"
 */

namespace BrainGames\Games\Even;

use function BrainGames\Engine\render;

use const BrainGames\AppConstants\ROUNDS_COUNT;
use const BrainGames\AppConstants\MIN_FOR_RAND;
use const BrainGames\AppConstants\MAX_FOR_RAND;

/**
 * Запускает "Проверку на четность"
 *
 * Пользователю показывается случайное число. И ему нужно ответить yes,
 * если число чётное, или no — если нечётное.
 * Игра продолжается до завершения всех раундов или первой ошибки.
 *
 * @return void
 */
function run(): void
{
    $rounds = [];
    $desc = 'Answer "yes" if the number is even, otherwise answer "no".';

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num = random_int(MIN_FOR_RAND, MAX_FOR_RAND);

        isEven($num) ? $correct = "yes" : $correct = "no";

        $rounds[$i]['question'] = $num;
        $rounds[$i]['rightAnswer'] = $correct;
    }

    render($desc, $rounds);
}

/**
 * Проверяет, является ли число четным
 *
 * @param string $num Проверяемое число
 * @return bool true - если четное, false - если нечетное
 */
function isEven(int $num): bool
{
    return $num % 2 === 0;
}
