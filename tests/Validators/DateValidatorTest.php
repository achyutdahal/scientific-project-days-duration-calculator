<?php

class DateValidatorTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider dateProvider
     */
    function testIsValid($date, $format, $expected)
    {
        $dateValidator = new \src\Service\Validators\DateValidator();
        $this->assertEquals($expected, $dateValidator->isValid($date, $format));
    }

    public function dateProvider(): array
    {
        return array(
            array('02/06/1983', 'd/m/Y', true),
            array('02/13/1983', 'd/m/Y', false),
            array('00/06/1983', 'd/mY', false),
            array('00-06-1983', 'd/m/Y', false),
            array('00/00/0000', 'd/m/Y', false),
            array('01-02-2021', 'd-m-Y', true),
        );
    }

}