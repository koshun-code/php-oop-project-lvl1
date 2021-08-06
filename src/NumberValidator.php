<?php

namespace Validator;

class NumberValidator extends Scema
{
    public function required()
    {
        $this->validators['required'] = function ($data) {
            return is_numeric($data);
        };
        return $this;
    }

    public function positive()
    {
        $this->validators['positive'] = function ($data) {
            return ($data >= 0);
        };
        return $this;
    }

    public function range($start, $finish)
    {
        $this->validators['range'] = function ($data) use ($start, $finish) {
            return (($start <= $data) && ($data <= $finish));
        };
        return $this;
    }
}