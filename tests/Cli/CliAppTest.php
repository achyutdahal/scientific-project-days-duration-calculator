<?php

use src\Service\Cli\StandardInput;

class CliAppTest extends \PHPUnit\Framework\TestCase
{
    use \Prophecy\PhpUnit\ProphecyTrait;

    public function testAddLine(){
        $standardInput = $this->prophesize(StandardInput::class);
        $app = new \src\Service\Cli\CliApp($standardInput->reveal());
        $this->expectOutputString("\n");
        $app->addLine();
    }

    public function testPrint(){
        $standardInput = $this->prophesize(StandardInput::class);
        $outputText = "This is just a dummy text to be printed in the standard output";
        $app = new \src\Service\Cli\CliApp($standardInput->reveal());
        $this->expectOutputString($outputText);
        $app->print($outputText);
    }

    public function testGetUserInput(){
        $standardInput = $this->prophesize(StandardInput::class);
        $standardInput->getUserInput()->shouldBeCalledOnce();
        $cliApp = new \src\Service\Cli\CliApp($standardInput->reveal());
        $cliApp->getUserInput();
    }
}