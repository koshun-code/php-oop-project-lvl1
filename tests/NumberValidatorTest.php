<?php 

namespace Validator\Tests;


use PHPUnit\Framework\TestCase;
use Validator\Validator;

class NumberValidatorTest extends TestCase
{
    private $valid;
    private $schema;


    public function setUp(): void
    {
        $this->valid = new Validator();
        $this->schema = $this->valid->numeric();
    }

    public function testRequire()
    {
        $this->assertTrue($this->schema->isValid(null));
        $this->schema->required();
        $this->assertTrue($this->schema->isValid(12));
        $this->assertTrue($this->schema->isValid(-10));
        $this->assertFalse($this->schema->isValid(null));
    }

    public function testPositive()
    {
        $this->schema->positive();
        $this->assertTrue($this->schema->isValid(10)); 
        $this->assertFalse($this->schema->isValid(-10));
    }

    public function testRange()
    {
        $this->schema->range(-5, 5);
        $this->assertEquals(true, $this->schema->isValid(-3));
        $this->assertEquals(true, $this->schema->isValid(5));
        $this->assertEquals(false, $this->schema->isValid(10));
    }
}