<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AssoPageController extends AbstractController
{
    #[Route('/asso/page', name: 'app_asso_page')]
    public function index(UserRepository $userRepository): Response
    {
        // denyAccessUnlessGranted c'est pour choisir le role qui peut voir la page 
        // $this->denyAccessUnlessGranted('ROLE_HOST');
        $users = $userRepository->findByRole("ROLE_ASSO");

    return $this->render('asso_page/index.html.twig', [
        'users' => $users,
    ]);

}

    #[Route('/asso/page/{slug}', name: 'app_asso_page_show')]
    public function showAsso($slug, UserRepository $userRepository):Response
    {
        // $this->denyAccessUnlessGranted('ROLE_HOST');
       //On récupère le lodging correspondant au slug
        $user = $userRepository->findOneBy(['slug' => $slug]);
       //On rend la page en lui passant le lodging
        return $this->render('asso_page/index.html.twig', [
        'user' => $user,
        ]);  
    }

    #[Route('/asso/page/show/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(int $id, UserRepository $userRepository): Response
    {
        // $this->denyAccessUnlessGranted('ROLE_HOST');
        return $this->render('user/show.html.twig', [
            'user' => $userRepository->find($id),
        ]);

        
    }
}
