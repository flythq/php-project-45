<?php

namespace BrainGames\Engine;

use function cli\prompt;
use function cli\line;

/**
 *  Выводит приветствие, задает вопросы и проверяет ответы
 *
 *  - Приветствует пользователя и запрашивает имя
 *  - Выводит описание игры
 *  - Последовательно задает вопросы из раундов
 *  - Проверяет корректность ответов пользователя
 *  - Завершает игру с сообщением о победе или досрочно при ошибке
 *
 * @param string $desc Описание игры для вывода пользователю
 * @param array $rounds Массив раундов игры, каждый элемент должен содержать:
 *                      - 'question' - строка с текстом вопроса
 *                      - 'rightAnswer' - строка с правильным ответом
 * @return void
 */
function render(string $desc, array $rounds): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line($desc);

    foreach ($rounds as $round) {
        line('Question: %s', $round['question']);
        $answer = prompt('Your answer');

        if ($round['rightAnswer'] !== $answer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $round['rightAnswer']);
            line("Let's try again, $name!");
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
}
