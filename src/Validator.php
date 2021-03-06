<?php

namespace Hexlet\Validator;

class Validator
{
    private array $customeValidator = [];

    public function string(): StringValidator
    {
        return new StringValidator($this->getCustomeValidator('string'));
    }
    public function number(): NumberValidator
    {
        return new NumberValidator($this->getCustomeValidator('number'));
    }
    public function array(): ArrayValidator
    {
        return new ArrayValidator($this->getCustomeValidator('array'));
    }
    public function addValidator(string $type, string $name, callable $fn): self
    {
        $this->customeValidator[$type][$name] = $fn;
        return $this;
    }
    public function getCustomeValidator(string $type): array
    {
        return $this->customeValidator[$type] ?? [];
    }
}
