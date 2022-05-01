<?php

namespace src\Service;

use DateTime;
use DateInterval;

class DaysCalculator
{

    /** @var bool */
    public bool $includeStartAndEnd = true;
    /** @var DateTime */
    private DateTime $startDate;
    /** @var DateTime */
    private DateTime $endDate;

    public function __construct(DateTime $startDate, DateTime $endDate)
    {
        $this->initialiseDates($startDate, $endDate);
    }

    public function calculateDateDiff(): int
    {
        $startDate = $this->startDate;
        $endDate = $this->endDate;
        if (!$this->includeStartAndEnd) {
            $startDate = $this->startDate->add(new DateInterval('P1D'));
        } else {
            $endDate = $this->endDate->add(new DateInterval('P1D'));
        }
        return $startDate->diff($endDate)->format('%a');
    }

    private function initialiseDates(DateTime $startDate, DateTime $endDate): void
    {
        if ($startDate > $endDate) {
            $this->startDate = $endDate;
            $this->endDate = $startDate;
        } else {
            $this->startDate = $startDate;
            $this->endDate = $endDate;
        }
        // We don't worry about time and are only concerned with the dates
        $this->startDate->setTime(0, 0);
        $this->endDate->setTime(0, 0);
    }
}