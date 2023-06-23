<?php

namespace App\Controller;

use App\Entity\Lodging;
use Symfony\Component\Mime\Address;
use App\Repository\LodgingRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
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
    public function index(LodgingRepository $lodgingRepository): Response
    {
        $lodgings = $lodgingRepository->findAll();
        return $this->render('lodging/index.html.twig', [
            'lodgings' => $lodgings,
        ]);
    }

    #[Route('/lodging/{slugLod}', name: 'app_lodging_show')]
    public function showLodging($slugLod, LodgingRepository $lodgingRepository): Response
    {
        
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
