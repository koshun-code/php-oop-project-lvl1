<?php

namespace Hexlet\Validator;

class ArrayValidator extends Scema
{
    public function require(): self
    {
        $this->validators['require'] = function ($data): bool {
            return is_array($data);
        };
        return $this;
    }
    public function sizeof(int $number): self
    {
        $this->validators['sizeof'] = fn($data) => count($data) === $number;
        return $this;
    }
    public function shape(array $schemas): self
    {
        $this->validators['shape'] = function ($data) use ($schemas): bool {
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
