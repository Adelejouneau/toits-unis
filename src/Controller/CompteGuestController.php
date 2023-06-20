<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteGuestController extends AbstractController
{
    #[Route('/compte/guest', name: 'app_compte_guest')]
    public function index(): Response
    {
        return $this->render('compte_guest/index.html.twig', [
            'controller_name' => 'CompteGuestController',
        ]);
    }
}
