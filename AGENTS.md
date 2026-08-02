# AGENTS.md

## Проект

«Brain Games» — консольное PHP-приложение с 5 играми на тренировку мозга (Калькулятор, Прогрессия, Чётность, НОД, Простое число). Каждая игра задаёт вопросы: 3 правильных ответа — победа, любой неверный — проигрыш.

## Установка

```bash
make install
```

Требуется: PHP >= 8.2, Make, Git.

## Основные команды Make

| Цель | Что делает |
|---|---|
| `make install` | `composer install` |
| `make validate` | `composer validate` |
| `make lint` | `phpcs --standard=PSR12 src bin` |
| `make fix` | `phpcbf --standard=PSR12 src bin` |
| `make brain-calc` | Запустить Калькулятор |
| `make brain-progression` | Запустить Прогрессию |
| `make brain-even` | Запустить Чётность |
| `make brain-gcd` | Запустить НОД |
| `make brain-prime` | Запустить Простое число |
| `make brain-games` | Запустить главный вход |

## Архитектура

- **`src/Cli.php`** — `printGreeting()` (приветствие + запрос имени)
- **`src/Engine.php`** — `runGame(string $description, array $rounds)` — игровой цикл; константа `ROUNDS_COUNT = 3`
- **`src/Games/`** — 5 модулей игр (Even, Calc, Gcd, Progression, Prime), каждый с функцией `run()`
- **`bin/`** — 6 PHP-скриптов-точек входа

### Автозагрузка

Composer `files` автозагрузка (не PSR-4) — все файлы загружаются напрямую. Функции импортируются через `use function`, константы через `use const`.

### Двойной путь автозагрузки в bin-скриптах

Каждый скрипт в `bin/` пытается подключить автозагрузку по двум путям для совместимости с платформой Hexlet:
```php
$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
```

## Тестирование

Тестовых файлов в репозитории нет. Тесты запускаются платформой Hexlet через автогенерируемый CI. Не редактировать `.github/workflows/hexlet-check.yml`.

## Линтинг

Стандарт PSR12, проверка через `phpcs` (squizlabs/php_codesniffer). Нет файла `phpcs.xml` — стандарт передаётся через Makefile. Используйте `make fix` для автоматического исправления нарушений.