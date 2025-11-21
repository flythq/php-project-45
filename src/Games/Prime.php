<?php

/**
 * "Простое ли число?"
 */

namespace BrainGames\Games\Prime;

const PRIME_MIN_FOR_RAND = 1;
const PRIME_MAX_FOR_RAND = 100;
const PRIME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

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

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomInteger = random_int(PRIME_MIN_FOR_RAND, PRIME_MAX_FOR_RAND);

        $answer = isPrime($randomInteger) ? 'yes' : 'no';

        $rounds[] = [
            'question' => (string)$randomInteger,
            'rightAnswer' => $answer
        ];
    }

    runGame(PRIME_DESCRIPTION, $rounds);
}

/**
 * Проверяет, является ли число простым
 *
 * @param int $number Проверяемое число
 * @return bool true - если число простое иначе false
 */
function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    if ($number === 2) {
        return true;
    }

    if ($number % 2 === 0) {
        return false;
    }

    for ($i = 3; $i <= sqrt($number); $i += 2) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
