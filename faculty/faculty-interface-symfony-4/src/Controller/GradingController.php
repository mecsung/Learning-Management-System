<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GradingController extends AbstractController
{
    /**
     * @Route("/grading", name="grading")
     */
    public function index(): Response
    {
        return $this->render('grading/index.html.twig', [
            'controller_name' => 'GradingController',
        ]);
    }
}
