<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GuestPageController extends AbstractController
{
    #[Route('/guest/page', name: 'app_guest_page')]
    public function index(): Response
    {
        return $this->render('guest_page/index.html.twig', [
            'controller_name' => 'GuestPageController',
        ]);
    }

    #[Route('/guest/page/{slug}', name: 'app_guest_page_show')]
    public function showGuest($slug, UserRepository $userRepository):Response
    {
       //On récupère le lodging correspondant au slug
        $user = $userRepository->findOneBy(['slug' => $slug]);
       //On rend la page en lui passant le lodging
        return $this->render('guest_page/index.html.twig', [
        'user' => $user,
        ]);  
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }
}
