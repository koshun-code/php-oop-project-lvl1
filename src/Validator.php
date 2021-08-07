<?php

namespace Hexlet\Validator;

class Validator
{
    private $customeValidator = [];

    public function string()
    {
        return new StringValidator($this->getCustomeValidator('string'));
    }
    public function number()
    {
        return new NumberValidator($this->getCustomeValidator('number'));
    }
    public function array()
    {
        return new ArrayValidator($this->getCustomeValidator('array'));
    }
    public function addValidator($type, $name, $fn)
    {
        $this->customeValidator[$type][$name] = $fn;
        return $this;
    }
    public function getCustomeValidator($type)
    {
        return $this->customeValidator[$type] ?? [];
    }
}
