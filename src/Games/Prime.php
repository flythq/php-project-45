<?php

/**
 * "Простое ли число?"
 */

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\render;

use const BrainGames\AppConstants\ROUNDS_COUNT;
use const BrainGames\AppConstants\MIN_FOR_RAND;
use const BrainGames\AppConstants\MAX_FOR_RAND;

/**
 * Пользователю показывается случайное число. И ему нужно ответить yes,
 * если число простое (отлично от 1 и делится без остатка только на 1 и на само себя),
 * или no — если нечётное.
 * Игра продолжается до завершения всех раундов или первой ошибки.
 *
 * @return void
 */
function run(): void
{
    $rounds = [];
    $desc = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num = random_int(MIN_FOR_RAND, MAX_FOR_RAND);

        $answer = isPrime($num) ? 'yes' : 'no';

        $rounds[$i]['question'] = (string)$num;
        $rounds[$i]['rightAnswer'] = $answer;
    }

    render($desc, $rounds);
}

/**
 * Проверяет, является ли число простым
 *
 * @param int $num Проверяемое число
 * @return bool true - если число простое иначе false
 */
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
