<?php

namespace BrainGames\Cli;

use function cli\prompt;
use function cli\line;

/**
 * Выводит приветствие и запрашивает имя пользователя.
 *
 * @return void
 */
function printGreeting(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
