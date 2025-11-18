# Brain games

### Hexlet tests and linter status:
[![Actions Status](https://github.com/flythq/php-project-45/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/flythq/php-project-45/actions)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=flythq_php-project-45&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=flythq_php-project-45)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=flythq_php-project-45&metric=bugs)](https://sonarcloud.io/summary/new_code?id=flythq_php-project-45)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=flythq_php-project-45&metric=code_smells)](https://sonarcloud.io/summary/new_code?id=flythq_php-project-45)
[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=flythq_php-project-45&metric=duplicated_lines_density)](https://sonarcloud.io/summary/new_code?id=flythq_php-project-45)
[![Lines of Code](https://sonarcloud.io/api/project_badges/measure?project=flythq_php-project-45&metric=ncloc)](https://sonarcloud.io/summary/new_code?id=flythq_php-project-45)

“Brain Games” is a set of five console games based on the principle of popular mobile apps for brain training. Each 
game asks questions that must be answered correctly. After three correct answers, the game is considered completed. 
Incorrect answers end the game and prompt the player to start over.Games:
* Calculator. Arithmetic expressions that need to be calculated.
* Progression. Search for missing numbers in a sequence of numbers.
* Determining an even number.
* Determining the greatest common divisor.
* Determining a prime number.

## Prerequisites

* Linux, Macos, WSL
* PHP >=8.2
* Make
* Git

## Setup

Setup [SSH](https://docs.github.com/en/authentication/connecting-to-github-with-ssh) before clone:

```bash
git clone git@github.com:flythq/php-project-45.git
cd php-project-45

make install
```

## Usage

### Calculator
```bash
make brain-calc
```
Example:
[![asciicast](https://asciinema.org/a/W8IIhjjQd9iuib2VyOANpNa2u.svg)](https://asciinema.org/a/W8IIhjjQd9iuib2VyOANpNa2u)

### Progression
```bash
make brain-progression
```
Example:
[![asciicast](https://asciinema.org/a/l08y2JZxLsGt0Y5rh3YlwCbbn.svg)](https://asciinema.org/a/l08y2JZxLsGt0Y5rh3YlwCbbn)

### Determining an even number
```bash
make brain-even
```
Example:
[![asciicast](https://asciinema.org/a/w2sGnDyUdtfhnCUN4iBY8pDaa.svg)](https://asciinema.org/a/w2sGnDyUdtfhnCUN4iBY8pDaa)

### Determining the greatest common divisor
```bash
make brain-gcn
```
Example:
[![asciicast](https://asciinema.org/a/PFgOpHwZUCXMoRvuCBCKTWAsc.svg)](https://asciinema.org/a/PFgOpHwZUCXMoRvuCBCKTWAsc)

### Determining a prime number
```bash
make brain-prime
```
Example:
[![asciicast](https://asciinema.org/a/Emo326c5sSuZrFVzFDMxeCPu6.svg)](https://asciinema.org/a/Emo326c5sSuZrFVzFDMxeCPu6)





















