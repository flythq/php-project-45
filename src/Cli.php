<?php

namespace BrainGames\Cli;

use function cli\prompt;
use function cli\line;

function hello(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
