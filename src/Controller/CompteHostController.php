<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\Address;
use App\Entity\Lodging;
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
         // On recupere l'utilisateur
        $user = $this->getUser();
        // On crée un formulaire avec les données de l'utilisateur
        $registrationHostForm = $this->createForm(UserType::class, $user);
        // 
        $registrationHostForm->handleRequest($request);

        if($registrationHostForm->isSubmitted() && $registrationHostForm->isValid()){
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

    $lodging = new Lodging();
    $formLodging = $this->createForm(LodgingType::class, $lodging);
    $formLodging->handleRequest($request);

    if ($formLodging->isSubmitted() && $formLodging->isValid()) {
        // Traitement du formulaire de logement
        $em->persist($lodging);
        $em->flush();

        // On met en place un message flash
        $this->addFlash('success', 'Le logement a été ajouté avec succès');

        // Redirection vers une autre page ou action
        // ...
    }
        return $this->render('compte_host/index.html.twig', [
            'registrationHostForm' => $registrationHostForm->createView(),
            'formLodging' => $formLodging->createView(),
            'controller_name' => 'CompteHostController',
        ]);
    }

    #[Route('/add-favori/user.{id}', name: 'add_favori')]
    public function addFavori($id, UserRepository $userRepository, EntityManagerInterface $em ):Response
    {
        $this->denyAccessUnlessGranted('ROLE_HOST');
        //On r"cupère le logement dans la bdd
        $user = $userRepository->find($id);
        //on récupère l'utilisateur
        $user = $this->getUser();
        //On ajoute le guest à la liste des favoris de l'utilisateur
        $user->addUser($user);
        //On met en place un msg flash
        $this->addFlash('success','Le guest a bien été ajouter à vos favoris');
        //On enregistre les modifs
        $em->persist($user);
        $em->flush();
        //On redirige vers la page des livres
        return $this->redirectToRoute('app_guest');
    }

    #[Route('/remove-lodging/{id}', name: 'remove_lodging')]
    public function removeLodging($id, LodgingRepository $lodgingRepository, EntityManagerInterface $em ):Response

    {
        $this->denyAccessUnlessGranted('ROLE_HOST');
        //On r"cupère la donnee dans la bdd
        $user = $userRepository->find($id);
        //on récupère l'utilisateur
        $user = $this->getUser();
        //On ajoute le guest à la liste des favoris de l'utilisateur
        $user->removeUser($user);
        //On met en place un msg flash
        $this->addFlash('success','Le guest a bien été retirer à vos favoris');
        //On enregistre les modifs
        $em->persist($user);
        $em->flush();
        //On redirige vers la page des guest
        return $this->redirectToRoute('app_guest_page');
    }

}