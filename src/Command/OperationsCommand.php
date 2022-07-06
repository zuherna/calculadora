<?php

namespace App\Command;

use App\Service\Calculator\CalculatorManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Stopwatch\Stopwatch;

class OperationsCommand extends Command
{
    protected static $defaultName = 'operations';

    private CalculatorManager $calculatorManager;
    private $output;

    public function __construct(CalculatorManager $calculatorManager)
    {
        $this->calculatorManager = $calculatorManager;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
             ->setDescription('Operación aritmética (add, subtract, multiply, divide) con 2 operadores')
             ->setHelp('Obteniendo los dos operadores y la operación aritmética como argumentos, devuelve el resultado de la operacion por consola
                        NOTA: para pasar como argumentos números negativos [Console] Stop parsing options after encountering "--" token -> symfony console operations 5 -- -6 add
                        Esto permite el soporte de argumentos con guiones iniciales (por ejemplo, "-1") sino dá error -> The "-6" option does not exist')
             ->addArgument('operatorA', InputArgument::REQUIRED, '¿ Número 1? ( Formatos numéricos válidos : 1, -3, 1.8, ... )')
             ->addArgument('operatorB', InputArgument::REQUIRED, '¿ Número 2? ( Formatos numéricos válidos : 1, -3, 1.8, ... )')
             ->addArgument('operation', InputArgument::REQUIRED, '¿ Operación ? [add, subtract, multiply, divide]')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $stopwatch = new Stopwatch();
        $stopwatch->start('execute');

        $this->output = $output;

        $this->output->writeln("[".((new \DateTime())->format('Y-m-d H:i:s'))."] ".get_class($this).": \n");

        $operatorA = $input->getArgument('operatorA');
        $operatorB = $input->getArgument('operatorB');
        $operation = $input->getArgument('operation');

        if ($this->isFormatNumeric($operatorA) && $this->isFormatNumeric($operatorB) && $this->calculatorManager->isOperator($operation)) {
            $operations = $this->calculatorManager->getOperations();

            foreach ($operations as $key => $value) {
                if ($key == $operation) {
                    $calculator = $this->calculatorManager->createCalculator($operation);
                    $result = $calculator->calculate($operatorA, $operatorB);

                    $this->output->writeln(strtoupper($value) . " " . $operatorA . " y " . $operatorB . " dá : " . $result);
                    break;
                }
            }
        } else {
            $this->errorArgumentMessages($operatorA, $operatorB, $operation);
        }

        $event = $stopwatch->stop('execute');
        $this->output->writeln("\nTOTAL # ".($event->getDuration() / 1000)."s - ".($event->getMemory() / (1024 * 1024))."MB\n");
    }

    private function errorArgumentMessages($operatorA, $operatorB, string $operation)
    {
        if (!$this->isFormatNumeric($operatorA)) {
            $this->output->writeln("*** ERR argumento NUMERO 1 ( Formatos numéricos válidos : 1, -3, 1.8, ... )\n");
        }

        if (!$this->isFormatNumeric($operatorB)) {
            $this->output->writeln("*** ERR argumento NUMERO 2 ( Formatos numéricos válidos : 1, -3, 1.8, ... )\n");
        }

        if (!$this->calculatorManager->isOperator($operation)) {
            $this->output->writeln("*** ERR argumento OPERACIÓN ( add, subtract, multiply, divide )\n");
        }
    }

    private function isFormatNumeric($num): bool
    {
        $regexNumbers = '/^([\-]?[0-9]*[\.]?[0-9]+)$/';
        preg_match($regexNumbers, $num, $matches);

        if (count($matches) !== 0) {
            return true;
        }

        return false;
    }
}
