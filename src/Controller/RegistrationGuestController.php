<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class RegistrationGuestController extends AbstractController
{
    #[Route('/registration/guest', name: 'app_registration_guest')]
    public function index(): Response
    {
        return $this->render('registration_guest/index.html.twig', [
            'controller_name' => 'RegistrationGuestController',
        ]);

    }

}