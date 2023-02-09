<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SymfonyConsoleListMakeController extends AbstractController
{
    /**
     * @Route("/symfony/console/list/make", name="app_symfony_console_list_make")
     */
    public function index(): Response
    {
        return $this->render('symfony_console_list_make/index.html.twig', [
            'controller_name' => 'SymfonyConsoleListMakeController',
        ]);
    }
}
