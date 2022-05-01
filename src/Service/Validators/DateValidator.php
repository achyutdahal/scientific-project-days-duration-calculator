<?php

namespace src\Service\Validators;

class DateValidator
{
    public function isValid(string $dateString, string $format = 'd/m/Y'): bool
    {
        $dateString = trim($dateString);
        $dateTime = \DateTime::createFromFormat($format, $dateString);
        return $dateTime && $dateTime->format($format) == $dateString;
    }
}