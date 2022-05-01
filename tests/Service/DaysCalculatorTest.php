<?php

class DaysCalculatorTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider dateProviderIncludeStartEnd
     */
    public function testDaysCalculatorIncludingStartAndEndDate($startDate, $endDate, $expected)
    {
        $startDateTimeObj = DateTime::createFromFormat('d/m/Y', $startDate);
        $endDateDateTimeObj = DateTime::createFromFormat('d/m/Y', $endDate);
        $startDateTimeObj->setTime(0, 0);
        $endDateDateTimeObj->setTime(0, 0);
        $dayCalculator = new \src\Service\DaysCalculator($startDateTimeObj, $endDateDateTimeObj);
        $this->assertEquals($expected, $dayCalculator->calculateDateDiff());
    }

    public function dateProviderIncludeStartEnd(): array
    {
        return array(
            array('02/06/1983', '22/06/1983', 21),
            array('04/07/1984', '25/12/1984', 175),
            array('03/01/1989', '03/08/1983', 1981),
            array('07/11/1972', '08/11/1972', 2),
            array('01/01/2000', '03/01/2000', 3),
            array('01/01/1901', '31/12/2999', 401402),
            array('01/01/1901', '03/01/1901', 3),
            array('25/12/2999', '31/12/2999', 7),
        );
    }
}