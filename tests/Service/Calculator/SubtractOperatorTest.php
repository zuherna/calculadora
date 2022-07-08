<?php

namespace App\Tests\Service\Calculator;

use App\Service\Calculator\SubtractOperator;
use PHPUnit\Framework\TestCase;

class SubtractOperatorTest extends TestCase
{
    public function testName(): void
    {
        $operator = new SubtractOperator();
        $this->assertEquals('subtract', $operator->name());
    }

    public function testCalculate()
    {
        $operator = new SubtractOperator();

        $this->assertEquals(-1, $operator->calculate(2, 3));
        $this->assertEquals(0.2, $operator->calculate(1.2, 1));
        $this->assertEquals(-8, $operator->calculate(-10, -2));
        $this->assertEquals(4.5, $operator->calculate(4, -0.5));
    }
}
