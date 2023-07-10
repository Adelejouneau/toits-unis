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
    public function index(UserRepository $userRepository): Response
    {
        // denyAccessUnlessGranted c'est pour choisir le role qui peut voir la page 
        // $this->denyAccessUnlessGranted('ROLE_HOST');
        $users = $userRepository->findByRole("ROLE_GUEST");

    return $this->render('guest_page/index.html.twig', [
        'users' => $users,
    ]);

}

    #[Route('/guest/page/{slug}', name: 'app_guest_page_show')]
    public function showGuest($slug, UserRepository $userRepository):Response
    {
        // $this->denyAccessUnlessGranted('ROLE_HOST');
       //On récupère le lodging correspondant au slug
        $user = $userRepository->findOneBy(['slug' => $slug]);
       //On rend la page en lui passant le lodging
        return $this->render('guest_page/index.html.twig', [
        'user' => $user,
        ]);  
    }

    #[Route('/guest/page/show/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(int $id, UserRepository $userRepository): Response
    {
        // $this->denyAccessUnlessGranted('ROLE_HOST');
        return $this->render('user/show.html.twig', [
            'user' => $userRepository->find($id),
        ]);

        
    }
}
