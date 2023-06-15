<?php

namespace App\Controller;

use App\Form\UserType;
use App\Repository\LodgingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
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
        return $this->render('profil/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/add-favori/{id}', name: 'add_favori')]
    public function addFavori($id, LodgingRepository $lodgingRepository, EntityManagerInterface $em ):Response
    {
        //On r"cupère le logement dans la bdd
        $lodging = $lodgingRepository->find($id);
        //on récupère l'utilisateur
        $user = $this->getUser();
        //On ajoute le logement à la liste des favoris de l'utilisateur
        $user->addLodging($lodging);
        //On met en place un msg flash
        $this->addFlash('success','Le logement a bien été ajouter à vos favoris');
        //On enregistre les modifs
        $em->persist($user);
        $em->flush();
        //On redirige vers la page des livres
        return $this->redirectToRoute('app_logement');
    }

    #[Route('/remove-livre/{id}', name: 'remove_livre')]
    public function removeLodging($id, LodgingRepository $lodgingRepository, EntityManagerInterface $em ):Response
    {
        //On r"cupère le livre dans la bdd
        $lodging = $lodgingRepository->find($id);
        //on récupère l'utilisateur
        $user = $this->getUser();
        //On ajoute le livre à la liste des favoris de l'utilisateur
        $user->removeLodging($lodging);
        //On met en place un msg flash
        $this->addFlash('success','Le lodging a bien été retirer à vos favoris');
        //On enregistre les modifs
        $em->persist($user);
        $em->flush();
        //On redirige vers la page des lodging
        return $this->redirectToRoute('app_profil');
    }
}

