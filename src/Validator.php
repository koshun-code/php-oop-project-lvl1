<?php

namespace Validator;

use Validator\StringValidator;

class Validator
{
    public function string()
    {
        return new StringValidator();
    }
}