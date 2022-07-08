<?php

namespace App\Tests\Service\Calculator;

use App\Service\Calculator\AddOperator;
use App\Service\Calculator\SubtractOperator;
use App\Service\Calculator\MultiplyOperator;
use App\Service\Calculator\DivideOperator;
use App\Service\Calculator\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculatorAdd;
    private Calculator $calculatorSubtract;
    private Calculator $calculatorMultiply;
    private Calculator $calculatorDivide;

    public function setUp(): void
    {
        $this->calculatorAdd = new Calculator(new AddOperator());
        $this->calculatorSubtract = new Calculator(new SubtractOperator());
        $this->calculatorMultiply = new Calculator(new MultiplyOperator());
        $this->calculatorDivide = new Calculator(new DivideOperator());
    }

    public function testGetOperationWithAddOperator(): void
    {
        $this->assertEquals('add', $this->calculatorAdd->getOperation());
    }

    public function testGetOperationWithSubtractOperator()
    {
        $this->assertEquals('subtract', $this->calculatorSubtract->getOperation());
    }

    public function testGetOperationWithMultiplyOperator()
    {
        $this->assertEquals('multiply', $this->calculatorMultiply->getOperation());
    }

    public function testGetOperationWithDivideOperator()
    {
        $this->assertEquals('divide', $this->calculatorDivide->getOperation());
    }

    public function testCalculateWithAddOperator()
    {
        $this->assertEquals(12, $this->calculatorAdd->calculate(10, 2));
        $this->assertEquals(11.9, $this->calculatorAdd->calculate(5.9, 6));
        $this->assertEquals(-11, $this->calculatorAdd->calculate(-5, -6));
        $this->assertEquals(1.5, $this->calculatorAdd->calculate(3, -1.5));
    }

    public function testCalculateWithSubtractOperator()
    {
        $this->assertEquals(8, $this->calculatorSubtract->calculate(10, 2));
        $this->assertEquals(-0.1, $this->calculatorSubtract->calculate(5.9, 6));
        $this->assertEquals(1, $this->calculatorSubtract->calculate(-5, -6));
        $this->assertEquals(4.5, $this->calculatorSubtract->calculate(3, -1.5));
    }

    public function testCalculateWithMultiplyOperator()
    {
        $this->assertEquals(20, $this->calculatorMultiply->calculate(10, 2));
        $this->assertEquals(35.4, $this->calculatorMultiply->calculate(5.9, 6));
        $this->assertEquals(30, $this->calculatorMultiply->calculate(-5, -6));
        $this->assertEquals(-4.5, $this->calculatorMultiply->calculate(3, -1.5));
    }

    public function testCalculateWithDivideOperator()
    {
        $this->assertEquals(5, $this->calculatorDivide->calculate(10, 2));
        $this->assertEqualsWithDelta(0.98333333333333, $this->calculatorDivide->calculate(5.9, 6), 0.0001);
        $this->assertEqualsWithDelta(0.83333333333333, $this->calculatorDivide->calculate(-5, -6), 0.0001);
        $this->assertEquals(-2, $this->calculatorDivide->calculate(3, -1.5));
        $this->assertNull($this->calculatorDivide->calculate(10, 0), 'calculate es null o nó');
    }
}
