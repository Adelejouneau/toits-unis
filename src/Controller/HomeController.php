<?php

namespace App\Controller;

use App\Repository\AssociationRepository;
use App\Repository\LodgingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(LodgingRepository $lodgingRepository, AssociationRepository $associationRepository, Request $request): Response
    {
        //On récupère juste 3 photos pour l'accueil
        $lodgings = $lodgingRepository->findBy([], ['id' => 'DESC'], 3);
        $associations = $associationRepository->findAll();

         //On rend la page en lui passant la liste des photos
        return $this->render('home/index.html.twig', [
            'lodgings' => $lodgings,
            'associations' => $associations,
        ]); 

    
    }

}
