<?php

namespace App\Controller;

use App\Entity\Faculty;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/", name="login")
     */
    public function index(): Response
    {
        $faculty=$this->getDoctrine()
        ->getRepository(Faculty::class)
        ->findAll();

        return $this->render('login/index.html.twig', [
            'faculty' => $faculty
        ]);
    }
}
