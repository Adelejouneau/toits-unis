<?php

namespace App\Controller;

use App\Entity\Lodging;
use App\Form\FilterHostAdressType;
use Symfony\Component\Mime\Address;
use App\Repository\LodgingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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
        // $this->denyAccessUnlessGranted('ROLE_ASSO');
        //dd($request->request->get('filter_host_adress'));        
        $filteredAdress = $request->request->get('filter_host_adress');
        if ($filteredAdress && isset($filteredAdress['department']) && $filteredAdress['department'] != "") {
            $lodgings = $lodgingRepository->findByDepartementId($filteredAdress['department']);
        } else {
            $lodgings = $lodgingRepository->findAll();
        }

        $filtered = new Lodging();
        $form = $this->createForm(FilterHostAdressType::class, $filtered);

        return $this->render('lodging/index.html.twig', [
            'lodgings' => $lodgings,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/lodging/show/{slugLod}', name: 'app_lodging_show')]
    public function showLodg($slugLod, LodgingRepository $lodgingRepository): Response
    {
        // $this->denyAccessUnlessGranted('ROLE_ASSO');
        // On récupère le lodging correspondant au slug
        $lodging = $lodgingRepository->findOneBy(['slugLod' => $slugLod]);

        if (!$lodging) {
            throw $this->createNotFoundException('Le logement n\'existe pas.');
        }

        // Envoi automatique d'un e-mail au propriétaire du logement
        foreach ($lodging->getUsers() as $user) {
            $this->sendEmailToUser($user, $lodging, $this->mailer);
        }

        // On rend la page en lui passant le lodging
        return $this->render('lodging/lodging_show.html.twig', [
            'lodging' => $lodging,
        ]);
    }

    private function sendEmailToUser($user, Lodging $lodging, MailerInterface $mailer)
    {
        $email = (new TemplatedEmail())
            ->from(new Address('mailer@toitsUnis.com', 'toitsUnis'))
            ->to($user->getEmail())
            ->subject('Nouvelle demande pour votre logement')
            ->htmlTemplate('lodging/request_host_email.html.twig')
            ->context([
                'user' => $user,
                'lodging' => $lodging,
                'expiresAtMessageData' => [
                    'expiresAt' => '+2 hours',
                ],
                'hostProfileUrl' => $this->generateUrl('app_compte_host', [], UrlGeneratorInterface::ABSOLUTE_URL),
            ]);

        $mailer->send($email);

        $this->addFlash('success', "Votre demande a bien été envoyée par e-mail à l'hôte qui devra vous répondre dans les 2 heures.");
        return $this->redirectToRoute('app_lodging_show', ['slugLod' => $lodging->getSlugLod()]);
    }

    #[Route('/register_lodging', name: 'app_register_lodging')]
    public function registerLodging(Request $request, EntityManagerInterface $entityManager): Response
    
    {
        $lodging = new Lodging();
        $lodging = $this->createForm(LodgingType::class, $lodging);
        $lodging->handleRequest($request);

        if ($lodging->isSubmitted() && $lodging->isValid()) {
            
            $entityManager->persist($lodging);
            $entityManager->flush();

        }

        return $this->render('registration_host/register_lodging.html.twig', [
            'lodging' => $lodging->createView(),
        ]);

    }
}
