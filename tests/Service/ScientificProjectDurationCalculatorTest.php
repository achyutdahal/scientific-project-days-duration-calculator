<?php

class ScientificProjectDurationCalculatorTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider dateProviderExcludeStartEnd
     */
    public function testDaysCalculatorExcludingStartAndEndDate($startDate, $endDate, $expected)
    {
        $startDateTimeObj = DateTime::createFromFormat('d/m/Y', $startDate);
        $endDateDateTimeObj = DateTime::createFromFormat('d/m/Y', $endDate);
        $startDateTimeObj->setTime(0, 0);
        $endDateDateTimeObj->setTime(0, 0);
        $dayCalculator = new \src\Service\ScientificProjectDurationCalculator($startDateTimeObj, $endDateDateTimeObj);
        $this->assertEquals($expected, $dayCalculator->calculateDateDiff());
    }

    public function dateProviderExcludeStartEnd(): array
    {
        return array(
            array('02/06/1983', '22/06/1983', 19),
            array('04/07/1984', '25/12/1984', 173),
            array('03/01/1989', '03/08/1983', 1979),
            array('07/11/1972', '08/11/1972', 0),
            array('01/01/2000', '03/01/2000', 1),
            array('01/01/1901', '31/12/2999', 401400),
            array('01/01/1901', '03/01/1901', 1),
            array('25/12/2999', '31/12/2999', 5),
        );
    }

}