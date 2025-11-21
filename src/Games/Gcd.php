<?php

/**
 * "НОД"
 */

namespace BrainGames\Games\Gcd;

const GCD_MIN_FOR_RAND = 1;
const GCD_MAX_FOR_RAND = 100;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

/**
 * Запускает "наибольший общий делитель (НОД)"
 *
 * Пользователю показывается два случайных числа, например, 25 50.
 * Пользователь должен вычислить и ввести наибольший общий делитель этих чисел.
 * Игра продолжается до завершения всех раундов или первой ошибки.
 *
 * @return void
 */
function run(): void
{
    $rounds = [];
    $description = "Find the greatest common divisor of given numbers.";

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomInteger1 = random_int(GCD_MIN_FOR_RAND, GCD_MAX_FOR_RAND);
        $randomInteger2 = random_int(GCD_MIN_FOR_RAND, GCD_MAX_FOR_RAND);

        $answer = getGcd($randomInteger1, $randomInteger2);

        $rounds[] = [
            'question' => "$randomInteger1 $randomInteger2",
            'rightAnswer' => (string)$answer
        ];
    }

    runGame($description, $rounds);
}

/**
 * Вычисляет наибольший общий делитель (НОД) двух целых чисел.
 * Использует алгоритм Евклида, рекурсивная реализация.
 *
 * @param int $a Первое число
 * @param int $b Второе число
 * @return int Наибольший общий делитель чисел $a и $b
 */
function getGcd(int $a, int $b): int
{
    if ($b === 0) {
        return $a;
    }

    return getGcd($b, $a % $b);
}
