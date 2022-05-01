<?php
require_once __DIR__ . '/vendor/autoload.php';

use src\Service\ValidationFactory;
use src\Service\ScientificProjectDurationCalculator;
use src\Service\Cli\ProjectDaysCalculatorCliApp;

// A few dependencies for the application
// These would be best in a separate factory or service providers
// but for the simplicity of the app, it's been kept here
// something to think about if we ever need to touch these fails again.
$app = new ProjectDaysCalculatorCliApp(new \src\Service\Cli\StandardInput());
$validator = new ValidationFactory();

// Print application info, about what it is and what it does
$app->printAppInfo();
$app->addLine();

// A variable to check the execution flow for the app indefinitely
$exitProgram = false;
while (!$exitProgram) {
    $app->addLine();
    list($startDate, $endDate) = $app->retrieveStartAndEndDate();
    $dateValidator = $validator->get(ValidationFactory::DATE_VALIDATOR);
    if (!$dateValidator->isValid($startDate) || !$dateValidator->isValid($endDate)) {
        $app->print("Invalid date. Date must be valid and should be in the format mm/dd/yyyy");
        $app->addLine();
        $app->print("Do you want to try again? [y] ? ");
        $validationResponse = strtolower($app->getUserInput());
        if ($validationResponse == 'y') {
            continue;
        } else {
            exit;
        }
    }
    $startDateTime = DateTime::createFromFormat('d/m/Y', $startDate);
    $endDateTime = DateTime::createFromFormat('d/m/Y', $endDate);
    $app->processAndDisplayResult(new ScientificProjectDurationCalculator($startDateTime, $endDateTime));
    $app->addLine();
    $app->addLine();
    $app->print('=> Continue the app for next run [y] ? ');
    $response = strtolower($app->getUserInput());
    $app->addLine();
    if ($response != 'y') {
        $exitProgram = true;
    }
}
