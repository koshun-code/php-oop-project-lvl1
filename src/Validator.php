<?php

namespace Validator;

use Validator\StringValidator;

class Validator
{
    public function string()
    {
        return new StringValidator();
    }
    public function numeric()
    {
        return new NumberValidator();
    }
    public function array()
    {
        return new ArrayValidator();
    }
}