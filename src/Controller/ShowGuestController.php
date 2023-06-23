<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowGuestController extends AbstractController
{
    //A changer comme ci-dessous ! #[Route('/show/guest', name: 'app_show_guest')]   
    #[Route('/show_guest', name: 'app_show_guest')]
    public function index(): Response
    {
        return $this->render('show_guest/index.html.twig', [
            'controller_name' => 'ShowGuestController',
        ]);
    }
}
