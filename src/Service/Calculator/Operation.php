<?php

namespace App\Service\Calculator;

interface Operation
{
/**
 * Returns an unique identifier name for the operation
 */
public function name() : string;

/**
 * Calculates the result after applying the operation to the operands.
 * For example, AddOperation will return for operands 5 and 6 the value 11 (5 + 6 = 11)
 */
public function calculate($operandA, $operandB);
}
