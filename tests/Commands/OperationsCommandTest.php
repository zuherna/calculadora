<?php

namespace App\Tests\Commands;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class OperationsCommandTest extends KernelTestCase
{
    public function testAddPositiveNumbers(): void
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('operations');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'operatorA' => 5.9,
            'operatorB' => 6,
            'operation' => 'add'
        ]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('SUMAR', $output);
    }

    public function testAddNegativeNumbers(): void
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('operations');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'operatorA' => '-5',
            'operatorB' => '-6',
            'operation' => 'add'
        ]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('-11', $output);
    }

    public function testDivisionByZero(): void
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('operations');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'operatorA' => 12,
            'operatorB' => 0,
            'operation' => 'divide'
        ]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('división por cero', $output);
    }
}
