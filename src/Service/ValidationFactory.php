<?php

namespace src\Service;

use src\Service\Validators\DateValidator;

class ValidationFactory
{
    const DATE_VALIDATOR = 'DATE';

    public function get($type)
    {
        // This would enable us using some other library if we want to
        if($type === self::DATE_VALIDATOR){
            return new DateValidator();
        }
    }
}