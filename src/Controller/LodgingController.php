<?php

namespace App\Controller;


use App\Entity\Lodging;
use App\Entity\Department;
use App\Form\FilterHostAdressType;
use Symfony\Component\Mime\Address;
use App\Repository\LodgingRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LodgingController extends AbstractController
{

    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    #[Route('/lodging', name: 'app_lodging')]
    public function index(LodgingRepository $lodgingRepository, Request $request): Response
    {
        // $this->denyAccessUnlessGranted('ROLE_GUEST');
        //dd($request->request->get('filter_host_adress'));        
        $filteredAdress = $request->request->get('filter_host_adress');
        if ($filteredAdress && isset($filteredAdress['department']) && $filteredAdress['department'] != "") {

        $lodgings = $lodgingRepository->findByDepartementId($filteredAdress['department']);
        } else {
        $lodgings = $lodgingRepository->findAll();

        }

        $filtered= new Lodging();

        $form = $this->createForm(FilterHostAdressType::class, $filtered);

        return $this->render('lodging/index.html.twig', [
            'lodgings' => $lodgings,
            "form"=>$form->createView(),
        ]);
    }


    #[Route('/lodging/show/{slugLod}', name: 'app_lodging_show')]
    public function showLodg($slugLod, LodgingRepository $lodgingRepository):Response

    {
        // $this->denyAccessUnlessGranted('ROLE_GUEST');
        // On récupère le lodging correspondant au slug
        $lodging = $lodgingRepository->findOneBy(['slugLod' => $slugLod]);

        if (!$lodging) {
            throw $this->createNotFoundException('Le logement n\'existe pas.');
        }

        // Envoi automatique d'un e-mail au propriétaire du logement
        $user = $lodging->getUser(); 
        $this->sendEmailToUser($user, $lodging);

        // On rend la page en lui passant le lodging
        return $this->render('lodging/lodging_show.html.twig', [
            'lodging' => $lodging,
        ]);
    }

    private function sendEmailToUser($user, Lodging $lodging)
    {
        $email = (new TemplatedEmail())
            ->from(new Address('mailer@toitsUnis.com','toitsUnis'))
            ->to($user->getEmail())
            ->subject('Nouvelle demande pour votre logement')
            ->htmlTemplate('lodging/request_host_email.html.twig')
            ->context([
                'user' => $user,
                'lodging' => $lodging,
                'expiresAtMessageData' => [
                'expiresAt' => '+2 hours',],
                'hostProfileUrl' => $this->generateUrl('app_compte_host', [], UrlGeneratorInterface::ABSOLUTE_URL),
                    ]);
            
            
            $this->mailer->send($email);

            $this->addFlash('success',"Votre demande a bien été envoyée par e-mail à l\'hôte qui devra vous répondre dans les 2 heures.");
            return $this->redirectToRoute('app_lodging_show', ['slugLod' => $lodging->getSlugLod()]);;
        
    }

}

    // #[Route('/lodging/recherche-adresse', name: 'app_lodging_filterShow')]
    // public function guestAdresseFilter(Request $request)
    // {
    //     // $guestReq='';
    //     $filtered= new Lodging();

    //     $form = $this->createForm(FilterHostAdressType::class, $filtered);

    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
        

    //         $filtered = $form->getData();
    //         dump($filtered->getDepartment());
            // die();
            //faire une requete qui permettra de recuperer tout les logements d'un departement
            //a partir de l'id du departement recuperé via le formulaire
            //debut code

            //Fin code
            // Renvoyer sur twig, le retour de la requete precedement creer
            


        //     return $this->render('lodging/filterLodging.html.twig', [
        //         ]);  
        // }
        
        // return $this->renderForm('lodging/filterLodging.html.twig',[
        //     'form'=> $form,
        // ]);
