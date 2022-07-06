<?php

namespace App\Service\Calculator;

class DivideOperator implements Operation
{
    public function name(): string
    {
        return 'dividir';
    }

    /**
     * Devolvemos num1 / num2
     */
    public function calculate($num1, $num2)
    {
        if($num2 == 0) {
            return null;
        }
        return $num1 / $num2;
    }
}
