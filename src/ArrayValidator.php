<?php 

namespace Validator;

class ArrayValidator extends Scema
{
    public function require()
    {
        $this->validators['require'] = function ($data) {
            return is_array($data);
        };
        return $this;
    }
    public function sizeof($number)
    {
        $this->validators['sizeof'] = fn($data) => count($data) === $number;
    }
}