<?php

namespace Validator;

/**
 * This interface contain methods that belong all classses
 */

abstract class Scema
{
    /**
     * Contains all validotors
     * It'll fill in implement in validators
     */
    protected $validators = [];

    /**
     * @data : mixid;
     * Function cheak data use validate function;
     */
    
    public function isValid($data)
    {
        foreach ($this->validators as $validator) {
            if (!$validator($data)) {
                return false;
            }
        }
        return true;
    }
}