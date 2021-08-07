<?php

namespace Hexlet\Validator;

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
    protected $customeValidator = [];

    public function __construct($customeValidator)
    {
        $this->customeValidator = $customeValidator;
    }

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
    public function test($fnName, $args)
    {
        $this->validators[$fnName] = function ($data) use ($fnName, $args) {
            $validator = $this->customeValidator[$fnName];
            return $validator($data, $args);
        };
        return $this;
    }
}