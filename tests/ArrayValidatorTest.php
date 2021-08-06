<?php 

namespace Validator\Tests;

use PHPUnit\Framework\TestCase;
use Validator\Validator;

class ArrayValidatorTest extends TestCase
{
    private $valid;
    private $schema;


    public function setUp(): void
    {
        $this->valid = new Validator();
        $this->schema = $this->valid->array();
    }

    public function testRequire()
    {
        $this->assertTrue($this->schema->isValid(null));
        $this->schema->require();
        $this->assertTrue($this->schema->isValid([]));
        $this->assertTrue($this->schema->isValid(['la-la-la', 'hexlet is cool']));
        $this->assertFalse($this->schema->isValid(null));
    }

    public function testSizeof()
    {
        $this->schema->sizeof(2);
        $this->assertEquals(true, $this->schema->isValid(['hexlet', 'code-basics']));
        $this->schema->sizeof(3);
        $this->assertEquals(false, $this->schema->isValid(['la-la-la']));
    }
}