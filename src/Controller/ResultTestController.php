<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultTestController extends AbstractController
{
    /**
     * @Route("/result/test", name="result_test")
     */
    public function index(): Response
    {
        return $this->render('result_test/index.html.twig', [
            'controller_name' => 'ResultTestController',
        ]);
    }
}
