<?php

namespace Validator;

class StringValidator extends Scema
{

    public function required()
    {
        $this->validators['required'] = function ($data) {
            return (is_string($data) && strlen($data) !== 0);
        };
        return $this;
    }

    public function minLength()
    {
        return $this;
    }
    public function contains(string $string)
    {
        return $this;
    }

}