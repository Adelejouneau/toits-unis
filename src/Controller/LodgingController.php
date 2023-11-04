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
    public function showLodg($slugLod, LodgingRepository $lodgingRepository, Request $request, MailerInterface $mailer): Response
    {
        // $this->denyAccessUnlessGranted('ROLE_ASSO');
        // On récupère le lodging correspondant au slug
        $lodging = $lodgingRepository->findOneBy(['slugLod' => $slugLod]);

        if (!$lodging) {
            throw $this->createNotFoundException('Le logement n\'existe pas.');
        }

        if ($request->isMethod('POST') && $request->request->has('submit_request')) {
            // Le bouton "Envoyer une demande" a été cliqué
            $user = $this->getUser(); // Récupérer l'utilisateur actuellement connecté
            
            if ($user) {
                $this->sendEmailToUser($user, $lodging, $mailer);
            } else {
                $this->addFlash('error', "Vous devez être connecté pour envoyer une demande.");
                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('lodging/lodging_show.html.twig', [
            'lodging' => $lodging,
        ]);
    }

    private function sendEmailToUser($host, Lodging $lodging, MailerInterface $mailer)
    {
        $user = $this->getUser();

        if ($user) {
            $email = (new TemplatedEmail())
                ->from(new Address($user->getEmail())) // Utilisez la propriété email de l'utilisateur
                ->to($lodging->getHost()->getEmail())
                ->subject('Nouvelle demande pour votre logement')
                ->htmlTemplate('lodging/request_host_email.html.twig')
                ->context([
                    'host' => $host,
                    'lodging' => $lodging,
                    'expiresAtMessageData' => [
                        'expiresAt' => '+2 hours',
                    ],
                    'hostProfileUrl' => $this->generateUrl('app_compte_asso', [], UrlGeneratorInterface::ABSOLUTE_URL),
                ]);

            $mailer->send($email);
        }

        $this->addFlash('success', "Votre demande a bien été envoyée par e-mail à l'hôte qui devra vous répondre dans les 2 heures.");
        return $this->redirectToRoute('app_lodging_show', ['slugLod' => $lodging->getSlugLod()]);
    }
}
