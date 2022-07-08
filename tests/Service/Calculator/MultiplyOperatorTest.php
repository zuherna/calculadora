<?php

namespace App\Tests\Service\Calculator;

use App\Service\Calculator\MultiplyOperator;
use PHPUnit\Framework\TestCase;

class MultiplyOperatorTest extends TestCase
{
    public function testName(): void
    {
        $operator = new MultiplyOperator();
        $this->assertEquals('multiply', $operator->name());
    }

    public function testCalculate()
    {
        $operator = new MultiplyOperator();

        $this->assertEquals(6, $operator->calculate(2, 3));
        $this->assertEquals(1.2, $operator->calculate(1.2, 1));
        $this->assertEquals(20, $operator->calculate(-10, -2));
        $this->assertEquals(-2, $operator->calculate(4, -0.5));
    }
}
