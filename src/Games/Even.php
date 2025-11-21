<?php

/**
 * "Проверка на чётность"
 */

namespace BrainGames\Games\Even;

const EVEN_MIN_FOR_RAND = 1;
const EVEN_MAX_FOR_RAND = 100;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

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
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomInteger = random_int(EVEN_MIN_FOR_RAND, EVEN_MAX_FOR_RAND);

        $answer = isEven($randomInteger) ? 'yes' : 'no';

        $rounds[] = [
            'question' => (string)$randomInteger,
            'rightAnswer' => $answer
        ];
    }

    runGame($description, $rounds);
}

/**
 * Проверяет, является ли число четным
 *
 * @param int $number Проверяемое число
 * @return bool true - если четное, false - если нечетное
 */
function isEven(int $number): bool
{
    return $number % 2 === 0;
}
