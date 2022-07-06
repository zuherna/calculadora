<?php

namespace App\Service\Calculator;

class MultiplyOperator implements Operation
{
    public function name(): string
    {
        return 'dividir';
    }

    /**
     * Devolvemos num1 * num2
     */
    public function calculate($num1, $num2)
    {
        return $num1 * $num2;
    }
}
