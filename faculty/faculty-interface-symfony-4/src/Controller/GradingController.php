<?php

namespace App\Controller;

use App\Entity\FacultyLoads;
use App\Entity\Faculty;
use App\Entity\CourseEnrolled;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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

    /**
     * @Route("/grading/grade/{id}", name="grade")
     */
    public function grade(int $id, Request $request): Response
    {
        $search1 = $request->get('course');
        $search2 = $request->get('fullname');
        
        $students = $this->getDoctrine()
            ->getRepository(CourseEnrolled::class)
            ->findmyStudent($search1, $search2);

        //----------------------------------------------
        $entityManager = $this->getDoctrine()->getManager();

        $addgrade = $entityManager->getRepository(CourseEnrolled::class)
            ->find($id);
        $form=$this->createFormBuilder($addgrade)
            ->add('interim1', TextType::class, [
                'label' => false,
                'attr' => [
                'placeholder' => '0',
                'class' => 'form-control'
                ]
            ])
            ->add('midterm', TextType::class, [
                'label' => false,
                'attr' => [
                'placeholder' => '0',
                'class' => 'form-control'
                ]
            ])
            ->add('interim2', TextType::class, [
                'label' => false,
                'attr' => [
                'placeholder' => '0',
                'class' => 'form-control'
                ]
            ])
            ->add('final', TextType::class, [
                'label' => false,
                'attr' => [
                'placeholder' => '0',
                'class' => 'form-control'
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Submit Grades',
                'attr' => [
                    'class' => 'btn btn-warning'
                ],
            ])
        ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $interim1 = $form['interim1']->getData();
            $midterm = $form['midterm']->getData();
            $interim2 = $form['interim2']->getData();
            $final = $form['final']->getData();

            $total = intval($interim1) + intval($midterm) + intval($interim2) + intval($final);
            $grade = intval($total)/4;

            if ($grade >= 60 && $grade <=65) {
                $remarks = '1.0';
            }
            else if ($grade > 65 && $grade <= 71) {
                $remarks = '1.5';
            }
            else if ($grade > 71 && $grade <= 77) {
                $remarks = '2.0';
            }
            else if ($grade > 77 && $grade <= 83) {
                $remarks = '2.5';
            }
            else if ($grade > 83 && $grade <= 89) {
                $remarks = '3.0';
            }
            else if ($grade > 89 && $grade <= 95) {
                $remarks = '3.5';
            }
            else if ($grade > 95 ) {
                $remarks = '4';
            }
            else {
                $remarks = 'R';
            }

            $addgrade->setInterim1($interim1);
            $addgrade->setMidterm($midterm);
            $addgrade->setInterim2($interim2);
            $addgrade->setFinal($final);

            $addgrade->setGrade($grade);
            $addgrade->setRemarks($remarks);

            $entityManager->flush();

            //return new Response('Saved new product with id '.$product->getId());
            return $this->redirectToRoute("grade", ['id' =>$id, 'course' =>$search1, 'fullname' =>$search2]);
       }


        return $this->render('grading/grade.html.twig', [
            'form' => $form->createView(),
            'students' => $students
        ]);
    }

}
