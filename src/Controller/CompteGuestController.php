<?php

namespace App\Controller;

use App\Form\UserType;
use App\Repository\LodgingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CompteGuestController extends AbstractController
{
    #[Route('/compte/guest', name: 'app_compte_guest')]
    public function index(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $encoder): Response
    {

         // On recupere l'utilisateur
        $user = $this->getUser();
        // On crée un formulaire avec les données de l'utilisateur
        $form = $this->createForm(UserType::class, $user);
        // 
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
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
        return $this->render('compte_guest/index.html.twig', [
            'controller_name' => 'CompteGuestController',
        ]);
    }
    #[Route('/add-favori/{id}', name: 'add_favori')]
    public function addFavori($id, LodgingRepository $lodgingRepository, EntityManagerInterface $em ):Response
    {
        //On récupère le logement dans la bdd
        $lodging = $lodgingRepository->find($id);
        //on récupère l'utilisateur
        $lodging = $this->getLodging();
        //On ajoute le logement à la liste des favoris de l'utilisateur
        $lodging->addLodging($lodging);
        //On met en place un msg flash
        $this->addFlash('success','Le logement a bien été ajouter à vos favoris');
        //On enregistre les modifs
        $em->persist($lodging);
        $em->flush();
        //On redirige vers la page des logements
        return $this->redirectToRoute('app_lodging');
    }

    #[Route('/remove-lodging/{id}', name: 'remove_lodging')]
    public function removeLodging($id, LodgingRepository $lodgingRepository, EntityManagerInterface $em ):Response
    {
        //On r"cupère la donnee dans la bdd
        $lodging = $lodgingRepository->find($id);
        //on récupère l'utilisateur
        $lodging = $this->getLodging();
        //On ajoute le lodging à la liste des favoris de l'utilisateur
        $lodging->removeLodging($lodging);
        //On met en place un msg flash
        $this->addFlash('success','Le logement a bien été retirer à vos favoris');
        //On enregistre les modifs
        $em->persist($lodging);
        $em->flush();
        //On redirige vers la page des lodging
        return $this->redirectToRoute('app_lodging');
    }

}
