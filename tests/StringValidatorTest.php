<?php

namespace Validator\Tests;

use PHPUnit\Framework\TestCase;
use Validator\Validator;

class StringValidatorTest extends TestCase
{
    public function testRequired()
    {
        $v = new Validator();
        $scema = $v->string();
        
        $this->assertTrue($scema->isValid(''));
        
        $scema->required();
        
        $this->assertTrue($scema->isValid('la la la'));

        $this->assertFalse($scema->isValid(''));

    }
}