<?php

namespace Hexlet\Validator\Tests;

use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator;
use function my_str_starts_with;

class ValidatorTest extends TestCase
{
    private $v;

    protected function setUp(): void
    {
        $this->v = new Validator();
    }

    public function testString()
    {
        $schema = $this->v->string();
        $this->assertTrue($schema->isValid(''));
        $schema->required();
        $this->assertTrue($schema->isValid('la la la'));
        $this->assertFalse($schema->isValid(''));
        $schema->minLength(3);
        $this->assertTrue($schema->isValid('Mounting Elbruss'));
        $this->assertFalse($schema->isValid('we'));
        $expected = $schema->contains('what')->isValid('what does the fox say'); // true
        $this->assertTrue($expected);
        $expected2 = $schema->contains('whatthe')->isValid('what does the fox say');
        $this->assertFalse($expected2);
    }
    public function testNumber()
    {
        $schema = $this->v->number();
        $this->assertTrue($schema->isValid(null));
        $schema->required();
        $this->assertTrue($schema->isValid(12));
        $this->assertTrue($schema->isValid(-10));
        $this->assertFalse($schema->isValid(null));

        $schema->positive();
        $this->assertTrue($schema->isValid(10)); 
        $this->assertFalse($schema->isValid(-10));
        $this->assertFalse($schema->isValid(-5));

        $schema->range(-5, 5);
        $this->assertEquals(false, $schema->isValid(-3));
        $this->assertEquals(true, $schema->isValid(5));
        $this->assertEquals(false, $schema->isValid(10));
    }
    public function testArray()
    {
        $schema = $this->v->array();

        $this->assertTrue($schema->isValid(null));
        $schema->require();
        $this->assertTrue($schema->isValid([]));
        $this->assertTrue($schema->isValid(['la-la-la', 'hexlet is cool']));
        $this->assertFalse($schema->isValid(null));

        $schema->sizeof(2);
        $this->assertEquals(true, $schema->isValid(['hexlet', 'code-basics']));
        $schema->sizeof(3);
        $this->assertEquals(false, $schema->isValid(['la-la-la']));
    }
    public function testShape()
    {
        $schema = $this->v->array();

        $schema->shape([
            'name' => $this->v->string()->required(),
            'age' => $this->v->number()->positive(),
        ]);
        $this->assertTrue($schema->isValid(['name' => 'kolya', 'age' => 100])); // true
        $this->assertTrue($schema->isValid(['name' => 'maya', 'age' => null])); // true
        $this->assertFalse($schema->isValid(['name' => '', 'age' => null])); // false
        $this->assertFalse($schema->isValid(['name' => 'ada', 'age' => -5])); // false
    }
    public function testAddValidator()
    {
        $fn = fn($value, $start) => my_str_starts_with($value, $start);
        // Метод добавления новых валидаторов
        // addValidator($type, $name, $fn)
        $this->v->addValidator('string', 'startWith', $fn);

        // Новые валидаторы вызываются через метод test
        $schema = $this->v->string()->test('startWith', 'H');
        $this->assertEquals(false, $schema->isValid('exlet')); // false
        $this->assertEquals(true, $schema->isValid('Hexlet')); // true

        $fn = fn($value, $min) => $value >= $min;
        $this->v->addValidator('number', 'min', $fn);

        $schema = $this->v->number()->test('min', 5);
        $this->assertEquals(false, $schema->isValid(4)); // false
        $this->assertEquals(true, $schema->isValid(6)); // true
    }
}
