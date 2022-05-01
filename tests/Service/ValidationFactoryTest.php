<?php

class ValidationFactoryTest extends \PHPUnit\Framework\TestCase
{

    public function testGetDateValidator()
    {
        $factory = new \src\Service\ValidationFactory();
        $this->assertInstanceOf(\src\Service\Validators\DateValidator::class, $factory->get('DATE'));
    }
}