<?php

namespace App\Tests\Service\Calculator;

use App\Service\Calculator\Calculator;
use App\Service\Calculator\CalculatorManager;
use PHPUnit\Framework\TestCase;

class CalculatorManagerOperatorTest extends TestCase
{
    public function testGetOperations(): void
    {
        $this->assertIsArray(
            CalculatorManager::getOperations(),
            "assert es array o nó"
        );
    }

    public function testIsOperator()
    {
        $calculatorManager = new CalculatorManager();
        $operations = CalculatorManager::getOperations();

        $this->assertTrue($calculatorManager->isOperator(array_key_first($operations)));
        $this->assertFalse($calculatorManager->isOperator('sumar'));
    }

    public function testCreateCalculator()
    {
        $calculatorManager = new CalculatorManager();
        $operations = CalculatorManager::getOperations();

        $this->assertInstanceOf(Calculator::class, $calculatorManager->createCalculator('add'));
    }
}
