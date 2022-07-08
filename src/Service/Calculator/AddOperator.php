<?php

namespace App\Service\Calculator;

class AddOperator implements Operation
{
    public function name(): string
    {
        return 'add';
    }

    /**
     * Devolvemos num1 + num2
     *
     * @param int|float   $num1
     * @param int|float   $num2
     */
    public function calculate($num1, $num2)
    {
        return $num1 + $num2;
    }
}
