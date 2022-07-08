<?php

namespace App\Service\Calculator;

class Calculator
{
    protected $operation;

    public function __construct(Operation $operation)
    {
        $this->operation = $operation;
    }

    public function getOperation(): string
    {
        return $this->operation->name();
    }

    /**
     * @param int|float   $num1
     * @param int|float   $num2
     */
    public function calculate($num1, $num2)
    {
        return $this->operation->calculate($num1, $num2);
    }
}
