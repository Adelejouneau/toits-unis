<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\Address;
use App\Entity\Lodging;
use App\Entity\User;
use App\Form\LodgingType;
use App\Repository\UserRepository;
use App\Repository\LodgingRepository;
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
            // On verifie si l'utilisateur a changer de mot de passe
            if(!is_null($request->request->get('plainPassword'))){
            //On encode le nouveau password et on l'affecte au user
            $password = $encoder->hashPassword($user, $request->request->get('plainPassword'));
            $user->setPassword($password);
            }
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

    #[Route('/add-favori/{id}', name: 'add_favori')]
    public function addFavori($id, UserRepository $userRepository, EntityManagerInterface $em ):Response

    {
        //On récupère le logement dans la bdd
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $guest = $userRepository->find($id);
        //on récupère l'utilisateur
        $user = $this->getUser();
        //On ajoute le logement à la liste des favoris de l'utilisateur

        $user->addGuest($guest);
        //On met en place un msg flash
        $this->addFlash('success',"L'hébergement a bien été ajouté à vos favoris");
        //On enregistre les modifs
        $em->persist($user);
        $em->flush();
    }



    }
