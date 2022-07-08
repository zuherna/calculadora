<?php

namespace App\Tests\Service\Calculator;

use App\Service\Calculator\DivideOperator;
use PHPUnit\Framework\TestCase;

class DivideOperatorTest extends TestCase
{
    public function testName(): void
    {
        $operator = new DivideOperator();
        $this->assertEquals('divide', $operator->name());
    }

    public function testCalculate()
    {
        $operator = new DivideOperator();

        $this->assertEqualsWithDelta(0.666666667, $operator->calculate(2, 3), 0.0001);
        $this->assertEquals(1.2, $operator->calculate(1.2, 1));
        $this->assertEquals(5, $operator->calculate(-10, -2));
        $this->assertEquals(-8, $operator->calculate(4, -0.5));
        $this->assertNull($operator->calculate(2, 0), 'calculate es null o nó');
    }
}
