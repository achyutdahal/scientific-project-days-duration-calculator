<?php

namespace src\Service\Cli;

use DateTime;
use src\Service\ScientificProjectDurationCalculator;

class ProjectDaysCalculatorCliApp extends CliApp
{

    public function printAppInfo()
    {
        $this->print("Welcome to Project Days Calculator");
        $this->addLine();
        $this->print("-------------------------------------------");
        $this->addLine();
        $this->print("This app will return the total no of days between the supplied start and end date EXCLUDING START AND END DATE.");
        $this->addLine();
        $this->print("End date will be used as start if the supplied end date is before the supplied start date");
        $this->addLine();
        $this->print("-------------------------------------------");
        $this->print("-------------------------------------------");


    }

    function retrieveStartAndEndDate(): array
    {
        // Get Start Date string
        $this->print("Start Date (mm/dd/yyyy): ");
        $startDate = $this->getUserInput();
        // Get End Date String
        $this->print("End Date (mm/dd/yyyy): ");
        $endDate = $this->getUserInput();
        return array($startDate, $endDate);
    }


    function processAndDisplayResult(ScientificProjectDurationCalculator $scientificProjectDurationCalculator): void
    {
        $totalDays = $scientificProjectDurationCalculator->calculateDateDiff();
        $days = $totalDays === 1 ? 'Day' : 'Days';
        $this->print(sprintf('Result : %d %s', $totalDays, $days));
    }
}