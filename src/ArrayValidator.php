<?php 

namespace Hexlet\Validator;

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
    public function shape($schemas)
    {
        $this->validators['shape'] = function ($data) use ($schemas) {
            foreach ($schemas as $key => $schema) {
                if (!$schema->isValid($data[$key])) {
                    return false;
                }
            }
            return true;
        };
        return $this;
    }
}