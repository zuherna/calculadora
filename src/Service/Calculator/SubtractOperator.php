<?php

namespace App\Service\Calculator;

class SubtractOperator implements Operation
{
    public function name(): string
    {
        return 'restar';
    }

    /**
     * Devolvemos num1 - num2
     */
    public function calculate($num1, $num2)
    {
        return $num1 - $num2;
    }
}
