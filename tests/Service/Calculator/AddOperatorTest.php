<?php

namespace App\Tests\Service\Calculator;

use App\Service\Calculator\AddOperator;
use PHPUnit\Framework\TestCase;

class AddOperatorTest extends TestCase
{
    public function testName(): void
    {
        $operator = new AddOperator();
        $this->assertEquals('add', $operator->name());
    }

    public function testCalculate()
    {
        $operator = new AddOperator();

        $this->assertEquals(5, $operator->calculate(2, 3));
        $this->assertEquals(2.2, $operator->calculate(1.2, 1));
        $this->assertEquals(-12, $operator->calculate(-10, -2));
        $this->assertEquals(3.5, $operator->calculate(4, -0.5));
    }
}
