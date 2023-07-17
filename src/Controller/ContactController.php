<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {

        $email = (new TemplatedEmail())
                ->from(new Address('mailer@toitsUnis.com', 'toitsUnis'))
                ->to($host->getEmail())
                    ->subject('Bienvenue dans le réseau ToitsUnis !')
                    ->htmlTemplate('contact/confirmation_contact_email.html.twig');
                    
            $this->mailer->send($email);

            // do anything else you need here, like send an email
            $this->addFlash('success','Inscription réussie, validez votre compte via le mail reçu.');
            return $this->redirectToRoute('app_home');
        }
        
       

        return $this->render('home/indext.html.twig', [
            'controller_name' => 'ContactController',
        ]);


    
}
