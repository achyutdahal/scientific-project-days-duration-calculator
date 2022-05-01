<?php

namespace src\Service;


class ScientificProjectDurationCalculator extends DaysCalculator
{
    /** @var bool */
    public bool $includeStartAndEnd = false;
}
