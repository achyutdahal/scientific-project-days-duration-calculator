<?php

class ProjectDaysCalculatorClipAppTest extends \PHPUnit\Framework\TestCase
{

    use \Prophecy\PhpUnit\ProphecyTrait;

    public function testPrintAppInfo(): void
    {
        $standardInput = $this->prophesize(\src\Service\Cli\StandardInput::class);
        $app = new \src\Service\Cli\ProjectDaysCalculatorCliApp($standardInput->reveal());
        $this->expectOutputString("Welcome to Day Different Calculator
-------------------------------------------
This app will return the total no of days between the supplied start and end date EXCLUDING START AND END DATE.
End date will be used as start if the supplied end date is before the supplied start date
--------------------------------------------------------------------------------------");
        $app->printAppInfo();
    }

    public function testRetrieveStartAndEndDate(): void
    {
        $standardInput = $this->prophesize(\src\Service\Cli\StandardInput::class);
        $standardInput->getUserInput()->shouldBeCalledTimes(2);
        $app = new \src\Service\Cli\ProjectDaysCalculatorCliApp($standardInput->reveal());
        $this->expectOutputString("Start Date (mm/dd/yyyy): End Date (mm/dd/yyyy): ");
        $app->retrieveStartAndEndDate();
    }

    public function testProcessAndDisplayResult_WithMoreThanOneDaysAsReturn(){
        $standardInput = $this->prophesize(\src\Service\Cli\StandardInput::class);
        $calculator = $this->prophesize(\src\Service\ScientificProjectDurationCalculator::class);
        $calculator->calculateDateDiff()->willReturn(3)->shouldBeCalledOnce();
        $app = new \src\Service\Cli\ProjectDaysCalculatorCliApp($standardInput->reveal());
        $this->expectOutputString("Result : 3 Days");
        $app->processAndDisplayResult($calculator->reveal());
    }

    public function testProcessAndDisplayResult_WithMoreThan1DaysAsReturn(){
        $standardInput = $this->prophesize(\src\Service\Cli\StandardInput::class);
        $calculator = $this->prophesize(\src\Service\ScientificProjectDurationCalculator::class);
        $calculator->calculateDateDiff()->willReturn(1)->shouldBeCalledOnce();
        $app = new \src\Service\Cli\ProjectDaysCalculatorCliApp($standardInput->reveal());
        $this->expectOutputString("Result : 1 Day");
        $app->processAndDisplayResult($calculator->reveal());
    }

    public function testProcessAndDisplayResult_WithZeroDaysAsReturn(){
        $standardInput = $this->prophesize(\src\Service\Cli\StandardInput::class);
        $calculator = $this->prophesize(\src\Service\ScientificProjectDurationCalculator::class);
        $calculator->calculateDateDiff()->willReturn(0)->shouldBeCalledOnce();
        $app = new \src\Service\Cli\ProjectDaysCalculatorCliApp($standardInput->reveal());
        $this->expectOutputString("Result : 0 Days");
        $app->processAndDisplayResult($calculator->reveal());
    }

}