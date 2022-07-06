<?php

namespace App\Controller;

use App\Service\Calculator\CalculatorManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public const DEFAULT_TEMPLATE_PATH = 'default/';

    private CalculatorManager $calculatorManager;

    public function __construct(CalculatorManager $calculatorManager)
    {
        $this->calculatorManager = $calculatorManager;
    }

    /**
     * @Route("/", name="app_index")
     */
    public function index(): Response
    {
        return $this->render(self::DEFAULT_TEMPLATE_PATH . 'index.html.twig', [
            "operations"  => $this->calculatorManager->getOperations()
        ]);
    }

    /**
     * @Route("/{operation}/{operatorA}/{operatorB}", name="app_calculate", requirements={"operation"="[a-z]+", "operatorA"="^([\-]?[0-9]*[\.]?[0-9]+)$", "operatorB"="^([\-]?[0-9]*[\.]?[0-9]+)$"}))
     */
    public function calculator(string $operation, $operatorA, $operatorB): Response
    {

        if (!$this->calculatorManager->isOperator($operation)) {
            return new JsonResponse(['result' => 'Operacion ' . $operation . ' NO VÁLIDA']);
        }

        $calculator = $this->calculatorManager->createCalculator($operation);
        $result = $calculator->calculate($operatorA, $operatorB);

        $data = [
            "result" => (is_null($result) ? 'La división por cero no está definida' : $result)
        ];

        $response = new JsonResponse();
        $response->setData($data);

        return $response;
    }
}
