<?php

namespace App\Controller;

use App\Entity\FacultyLoads;
use App\Entity\Faculty;
use App\Entity\CourseEnrolled;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index(): Response
    {
        $user = $this->getUser()->getFullname();
        
        $all = $this->getDoctrine()
            ->getRepository(FacultyLoads::class)
            ->findClass($user);

        return $this->render('student/index.html.twig', [
            'all' => $all,
        ]);
    }

    /**
     * @Route("/student/mystudent/{id}", name="view")
     */
    public function view(int $id, Request $request): Response
    {
        $course = $this->getDoctrine()
            ->getRepository(FacultyLoads::class)
            ->find($id);

        $search1 = $request->get('course');
        $search2 = $request->get('class');
        
        $students = $this->getDoctrine()
            ->getRepository(CourseEnrolled::class)
            ->findStudent($search1, $search2);
        
        return $this->render('student/view.html.twig', [
            'course' => $course,
            'students' => $students
        ]);
    }
}
