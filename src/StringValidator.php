<?php

namespace Hexlet\Validator;

class StringValidator extends Scema
{

    public function required(): self
    {
        $this->validators['required'] = function ($data): bool {
            return (is_string($data) && strlen($data) !== 0);
        };
        return $this;
    }

    public function minLength(int $length): self
    {
        $this->validators['minLength'] = function ($data) use ($length): bool {
            return strlen($data) >= $length;
        };
        return $this;
    }
    public function contains(string $string): self
    {
        $this->validators['contains'] = function ($data) use ($string): bool {
            return strpos($data, $string) !== false;
        };
        return $this;
    }
}
