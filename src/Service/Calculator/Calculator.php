<?php

namespace App\Service\Calculator;


class Calculator
{

    protected $operation;

    public function __construct(Operation $operation)
    {
        $this->operation = $operation;
    }

    public function calculate($num1, $num2)
    {
        return $this->operation->calculate($num1, $num2);
    }
}
