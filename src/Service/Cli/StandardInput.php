<?php

namespace src\Service\Cli;

class StandardInput
{
    public function getUserInput(): string
    {
        $handle = fopen("php://stdin", "r");
        return trim(fgets($handle));
    }
}