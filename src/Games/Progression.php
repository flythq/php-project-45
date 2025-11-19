<?php

/**
 * "Арифметическая прогрессия"
 */

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\render;

use const BrainGames\AppConstants\ROUNDS_COUNT;
use const BrainGames\AppConstants\MIN_PROGRESSION_START;
use const BrainGames\AppConstants\MAX_PROGRESSION_START;
use const BrainGames\AppConstants\MIN_PROGRESSION_STEP;
use const BrainGames\AppConstants\MAX_PROGRESSION_STEP;
use const BrainGames\AppConstants\MIN_PROGRESSION_LENGTH;
use const BrainGames\AppConstants\MAX_PROGRESSION_LENGTH;

/**
 * Запускает "Арифметическую прогрессию"
 *
 * Показывает игроку ряд чисел, образующий арифметическую прогрессию,
 * заменив любое из чисел двумя точками. Игрок должен определить это число.
 * Игра продолжается до завершения всех раундов или первой ошибки.
 *
 * @return void
 */
function run(): void
{
    $rounds = [];
    $desc = "What number is missing in the progression?";

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $start = random_int(MIN_PROGRESSION_START, MAX_PROGRESSION_START);
        $step = random_int(MIN_PROGRESSION_STEP, MAX_PROGRESSION_STEP);
        $len = random_int(MIN_PROGRESSION_LENGTH, MAX_PROGRESSION_LENGTH);

        $progression = generateProgression($start, $step, $len);

        $index = array_rand($progression);
        $answer = $progression[$index];
        $progression[$index] = '..';

        $rounds[$i]['question'] = implode(" ", $progression);
        $rounds[$i]['rightAnswer'] = (string)$answer;
    }

    render($desc, $rounds);
}

/**
 *  Генерирует арифметическую прогрессию
 *
 * Создает массив элементов арифметической прогрессии по заданным параметрам.
 * Каждый следующий элемент прогрессии увеличивается на указанный шаг.
 *
 * @param int $start Первый элемент прогрессии
 * @param int $step Шаг прогрессии
 * @param int $len Количество элементов в прогрессии (длина массива)
 * @return array Массив элементов арифметической прогрессии
 */
function generateProgression(int $start, int $step, int $len): array
{
    $progression = [];

    for ($i = 0; $i <= $len; $i++) {
        $progression[] = $start + ($i * $step);
    }

    return $progression;
}
