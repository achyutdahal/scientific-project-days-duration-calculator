<?php

namespace src\Service\Cli;

class CliApp
{
    /** @var StandardInput */
    private StandardInput $standardInput;

    public function __construct(StandardInput $standardInput)
    {
        $this->standardInput = $standardInput;
    }

    public function addLine(): void
    {
        echo "\n";
    }

    public function print(string $outputText): void
    {
        echo $outputText;
    }

    public function getUserInput(): string
    {
        return $this->standardInput->getUserInput();
    }

}