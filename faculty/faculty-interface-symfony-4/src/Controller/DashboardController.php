<?php

namespace App\Controller;

use App\Entity\Announcements;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): Response
    {
        $ann=$this->getDoctrine()
        ->getRepository(Announcements::class)
        ->findAll();
        
        return $this->render('dashboard/index.html.twig', [
            'announcement' => $ann
        ]);
    }
}
