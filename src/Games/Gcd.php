<?php

/**
 * "НОД"
 */

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\render;

use const BrainGames\AppConstants\ROUNDS_COUNT;
use const BrainGames\AppConstants\MIN_FOR_RAND;
use const BrainGames\AppConstants\MAX_FOR_RAND;

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
    $desc = "Find the greatest common divisor of given numbers.";

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num1 = random_int(MIN_FOR_RAND, MAX_FOR_RAND);
        $num2 = random_int(MIN_FOR_RAND, MAX_FOR_RAND);

        $answer = getGcd($num1, $num2);

        $rounds[$i]['question'] = "$num1 $num2";
        $rounds[$i]['rightAnswer'] = (string)$answer;
    }

    render($desc, $rounds);
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
