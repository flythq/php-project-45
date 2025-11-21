<?php

/**
 * "Калькулятор"
 */

namespace BrainGames\Games\Calc;

const CALC_MIN_FOR_RAND = 1;
const CALC_MAX_FOR_RAND = 100;
const  CALC_ALLOWED_OPERATORS = ['+', '-', '*'];
const CALC_DESCRIPTION = 'What is the result of the expression?';

use function BrainGames\Engine\runGame;

use function cli\line;
use const BrainGames\Engine\ROUNDS_COUNT;

/**
 * Запускает "Калькулятор"
 *
 * Пользователю показывается случайное математическое выражение, например 35 + 16,
 * которое нужно вычислить и записать правильный ответ.
 * Числа и оператор выбираются случайным образом.
 * Реализованы операторы: +, -, *
 * Игра продолжается до завершения всех раундов или первой ошибки.
 *
 * @return void
 */
function run(): void
{
    $rounds = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randomInteger1 = random_int(CALC_MIN_FOR_RAND, CALC_MAX_FOR_RAND);
        $randomInteger2 = random_int(CALC_MIN_FOR_RAND, CALC_MAX_FOR_RAND);
        $randomIndex = array_rand(CALC_ALLOWED_OPERATORS);
        $randomOperator = CALC_ALLOWED_OPERATORS[$randomIndex];

        $answer = calculate($randomInteger1, $randomInteger2, $randomOperator);

        $rounds[] = [
            'question' => "$randomInteger1 $randomOperator $randomInteger2",
            'rightAnswer' => (string)$answer,
        ];
    }

    runGame(CALC_DESCRIPTION, $rounds);
}

/**
 * Вычисляет результат арифметической операции
 *
 * Выполняет базовые арифметические операции: сложение, вычитание, умножение.
 * Возвращает null для неизвестных операторов.
 *
 * @param int $a Первый операнд
 * @param int $b Второй операнд
 * @param string $operator Арифметический оператор (+, -, *)
 * @return int Результат вычисления или null для неизвестного оператора
 */
function calculate(int $a, int $b, string $operator): int
{
    return match ($operator) {
        "+" => $a + $b,
        "-" => $a - $b,
        "*" => $a * $b,
        default => die("Error: Unknown operator '$operator'\n"),
    };
}
