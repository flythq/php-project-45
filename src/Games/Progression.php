<?php

/**
 * "Арифметическая прогрессия"
 */

namespace BrainGames\Games\Progression;

const PROGRESSION_MIN_START = 1;
const PROGRESSION_MAX_START = 20;
const PROGRESSION_MIN_STEP = 1;
const PROGRESSION_MAX_STEP = 10;
const PROGRESSION_MIN_LENGTH = 5;
const PROGRESSION_MAX_LENGTH = 10;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

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
    $description = "What number is missing in the progression?";

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $start = random_int(PROGRESSION_MIN_START, PROGRESSION_MAX_START);
        $step = random_int(PROGRESSION_MIN_STEP, PROGRESSION_MAX_STEP);
        $lenght = random_int(PROGRESSION_MIN_LENGTH, PROGRESSION_MAX_LENGTH);

        $progression = generateProgression($start, $step, $lenght);

        $randomIndex = array_rand($progression);
        $answer = $progression[$randomIndex];
        $progression[$randomIndex] = '..';

        $rounds[] = [
            'question' => implode(' ', $progression),
            'rightAnswer' => (string)$answer
        ];
    }

    runGame($description, $rounds);
}

/**
 *  Генерирует арифметическую прогрессию
 *
 * Создает массив элементов арифметической прогрессии по заданным параметрам.
 * Каждый следующий элемент прогрессии увеличивается на указанный шаг.
 *
 * @param int $start Первый элемент прогрессии
 * @param int $step Шаг прогрессии
 * @param int $lenght Количество элементов в прогрессии (длина массива)
 * @return array Массив элементов арифметической прогрессии
 */
function generateProgression(int $start, int $step, int $lenght): array
{
    $progression = [];

    for ($i = 0; $i <= $lenght; $i++) {
        $progression[] = $start + ($i * $step);
    }

    return $progression;
}
