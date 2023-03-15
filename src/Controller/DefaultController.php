<?php

namespace App\Controller;

use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {  

        $user = new User();

        $form =$this->createForm(UserType::class);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
