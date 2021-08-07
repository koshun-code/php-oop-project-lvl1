<?php

namespace Hexlet\Validator;

class NumberValidator extends Scema
{
    public function required(): self
    {
        $this->validators['required'] = function ($data) {
            return is_numeric($data);
        };
        return $this;
    }

    public function positive(): self
    {
        $this->validators['positive'] = function ($data) {
            return $data === null || $data > 0;
        };
        return $this;
    }

    public function range($start, $finish): self
    {
        $this->validators['range'] = function ($data) use ($start, $finish) {
            return (($start <= $data) && ($data <= $finish));
        };
        return $this;
    }
}
