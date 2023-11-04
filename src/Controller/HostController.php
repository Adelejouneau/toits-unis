<?php

namespace App\Controller;

use App\Entity\Host;
use App\Form\HostFormType;
use App\Security\EmailHost;
use App\Security\EmailVerifier;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface as Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HostController extends AbstractController
{

    private EmailVerifier $emailHost;
    private Mailer $mailer;

    public function __construct(EmailVerifier $emailVerifier, Mailer $mailer, RouterInterface $router)
    {
        $this->emailHost = $emailVerifier;
        $this->mailer = $mailer;

    }

    #[Route('/register_host', name: 'app_register_host')]
    public function registerHost(Request $request, EntityManagerInterface $entityManager): Response
    
    {
        $host = new Host();
        $HostForm = $this->createForm(HostFormType::class, $host);
        $HostForm->handleRequest($request);

        if ($HostForm->isSubmitted() && $HostForm->isValid()) {
            
            
            $entityManager->persist($host);
            $entityManager->flush();


            $email = (new TemplatedEmail())
                ->from(new Address('mailer@toitsUnis.com', 'toitsUnis'))
                ->to($host->getEmail())
                    ->subject('Bienvenue dans le réseau ToitsUnis !')
                    ->htmlTemplate('registration_host/confirmation_host_email.html.twig');
                    
            $this->mailer->send($email);

            // do anything else you need here, like send an email
            $this->addFlash('success','Merci ! Un e-mail vient de vous être envoyé');
            return $this->redirectToRoute('app_register_host');
        }
        
        return $this->render('registration_host/register_host.html.twig', [
            'HostForm' => $HostForm->createView(),
        ]);
    }

    }

