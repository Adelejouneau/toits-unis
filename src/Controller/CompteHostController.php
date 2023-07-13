<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CompteHostController extends AbstractController
{
    #[Route('/compte/host', name: 'app_compte_host')]
    public function index(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $encoder): Response
    {
        $this->denyAccessUnlessGranted('ROLE_HOST');
        // On récupère l'utilisateur connecté
        $user = $this->getUser();
        // On crée un formulaire avec les données de l'utilisateur
        $hostForm = $this->createForm(UserType::class, $user);
        
        $hostForm->handleRequest($request);

        if($hostForm->isSubmitted() && $hostForm->isValid()){
            
            //on me en place un msg flash
            $this->addFlash('success','Votre profil a bien été modifié');
            //on enregistre les modif
            $em->persist($user);
            $em->flush();
        }


        return $this->render('compte_host/index.html.twig', [
            'hostForm' => $hostForm->createView(),
            'controller_name' => 'CompteHostController',
        ]);
    }

    }
