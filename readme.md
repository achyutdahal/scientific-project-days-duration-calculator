# Scientific Project: Total Days Calculator


This is a very simple PHP cli application which calculates the total number of days for the given start date and end date. Both start date and end date is not included in the calculation.

## Features

- A simple CLI app accepting start and end date to calculate the total days
- The app can accept indefinite runs and can be exited by user input
- End date will be used as start date if the supplied end date is before the supplied start date.


## Tech

- [PHP](https://www.php.net/) - Hypertext Preprocessor

## Installation

Requires [PHP](https://www.php.net/) 7.4+ and [Composer](https://getcomposer.org/) to run.

Install composer run the following to install the necessary dependencies for running the unit test

```sh
composer install
```

We can run the application with the following command
```sh
php index.php
```

## Unit tests
All classes and methods have been unit tested and requires PHPUnit to run


To run the unit tests, execute the following command:

```sh
./vendor/bin/phpunit tests
```