<?php

namespace Validator\Tests;

use PHPUnit\Framework\TestCase;
use Validator\Validator;

class StringValidatorTest extends TestCase
{
    private $valid;
    private $schema;


    public function setUp(): void
    {
        $this->valid = new Validator();
        $this->schema = $this->valid->string();
    }

    public function testRequired(): void
    {
        
        $this->assertTrue($this->schema->isValid(''));
        
        $this->schema->required();
        
        $this->assertTrue($this->schema->isValid('la la la'));

        $this->assertFalse($this->schema->isValid(''));

        $this->schema->minLength(3);

        $this->assertTrue($this->schema->isValid('Mounting Elbruss'));
        $this->assertFalse($this->schema->isValid('we'));

        $expected = $this->schema->contains('what')->isValid('what does the fox say'); // true
        $this->assertTrue($expected);
        $expected2 = $this->schema->contains('whatthe')->isValid('what does the fox say');
        $this->assertFalse($expected2);
    }
}