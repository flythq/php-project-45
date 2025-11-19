<?php

/**
 * "Калькулятор"
 */

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\render;

use const BrainGames\AppConstants\ROUNDS_COUNT;
use const BrainGames\AppConstants\MIN_FOR_RAND;
use const BrainGames\AppConstants\MAX_FOR_RAND;

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
    $desc = 'What is the result of the expression?';
    $operators = ['+', '-', '*'];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num1 = random_int(MIN_FOR_RAND, MAX_FOR_RAND);
        $num2 = random_int(MIN_FOR_RAND, MAX_FOR_RAND);
        $operator = $operators[array_rand($operators)];

        $answer = calculate($num1, $num2, $operator);

        $rounds[$i]['question'] = "$num1 $operator $num2";
        $rounds[$i]['rightAnswer'] = (string)$answer;
    }

    render($desc, $rounds);
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
 * @return int|null Результат вычисления или null для неизвестного оператора
 */
function calculate(int $a, int $b, string $operator): ?int
{
    return match ($operator) {
        "+" => $a + $b,
        "-" => $a - $b,
        "*" => $a * $b,
        default => null,
    };
}
