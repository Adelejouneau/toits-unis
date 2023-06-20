<?php

namespace App\Controller;

use App\Repository\LodgingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LodgingController extends AbstractController
{
    #[Route('/lodging', name: 'app_lodging')]
    public function index(LodgingRepository $lodgingRepository): Response
    {
        $lodgings = $lodgingRepository->findAll();
        return $this->render('lodging/index.html.twig', [
            'lodgings' => $lodgings,
        ]);
    }

    #[Route('/lodging/{slug}', name: 'app_lodging_show')]
    public function showBook($slug, LodgingRepository $lodgingRepository):Response
    {
       //On récupère le lodging correspondant au slug
        $lodging = $lodgingRepository->findOneBy(['slug' => $slug]);
       //On rend la page en lui passant le lodging
        return $this->render('lodging/show.html.twig', [
        'lodging' => $lodging,
        ]);  
    }
}
