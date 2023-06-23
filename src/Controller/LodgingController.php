<?php

namespace App\Controller;

use App\Entity\Department;
use App\Entity\Lodging;
use App\Form\FilterHostAdressType;
use App\Repository\LodgingRepository;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/lodging/show/{slugLod}', name: 'app_lodging_show')]
    public function showLodg($slugLod, LodgingRepository $lodgingRepository):Response
    {
       //On récupère le lodging correspondant au slug
        $lodging = $lodgingRepository->findOneBy(['slugLod' => $slugLod]);
       //On rend la page en lui passant le lodging
        return $this->render('lodging/show.html.twig', [
        'lodging' => $lodging,
        ]);  
    }

    #[Route('/lodging/recherche_Adresse', name: 'app_lodging_filterShow')]
    public function guestAdresseFilter(Request $request)
    {
        // $guestReq='';
        $filtered= new Lodging;

        $form = $this->createForm(FilterHostAdressType::class, $filtered);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        

            $filtered = $form->getData();
            dump($filtered->getDepartment());
            // die();
            //faire une requete qui permettra de recuperer tout les logements d'un departement
            //a partir de l'id du departement recuperé via le formulaire
            //debut code

            //Fin code
            // Renvoyer sur twig, le retour de la requete precedement creer
            


            return $this->render('lodging/filterLodging.html.twig', [
                
                ]);  
        }
        
        return $this->renderForm('lodging/filterLodging.html.twig',[
            'form'=> $form,
        ]);

    }

}
