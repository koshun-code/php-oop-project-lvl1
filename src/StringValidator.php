<?php

namespace Hexlet\Validator;

class StringValidator extends Scema
{

    public function required()
    {
        $this->validators['required'] = function ($data) {
            return (is_string($data) && strlen($data) !== 0);
        };
        return $this;
    }

    public function minLength($length)
    {
        $this->validators['minLength'] = function ($data) use ($length) {
            return strlen($data) >= $length;
        };
        return $this;
    }
    public function contains(string $string)
    {
        $this->validators['contains'] = function ($data) use ($string) {
            return strpos($data, $string) !== false;
        };
        return $this;
    }

}