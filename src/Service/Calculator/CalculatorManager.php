<?php

namespace App\Service\Calculator;

class CalculatorManager
{
    public static function getOperations(): array
    {
        return [
            'add'      => 'Sumar',
            'subtract' => 'Restar',
            'multiply' => 'Multiplicar',
            'divide'   => 'Dividir'
        ];
    }

    public function isOperator(string $operator): bool
    {
        if (in_array($operator, $this->getOperators())) {
            return true;
        }

        return false;
    }


    public function createCalculator(string $operator): ?Calculator
    {
        $operators = $this->getOperators();

        if ($operator == $operators[0]) {
            return new Calculator(new AddOperator());
        }

        if ($operator == $operators[1]) {
            return new Calculator(new SubtractOperator());
        }

        if ($operator == $operators[2]) {
            return new Calculator(new MultiplyOperator());
        }

        if ($operator == $operators[3]) {
            return new Calculator(new DivideOperator());
        }

        return null;
    }

    private function getOperators(): array
    {
        return array_keys($this->getOperations());
    }
}
