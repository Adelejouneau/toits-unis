<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    
    public function index(Request $request, MailerInterface $mailer): Response
    {
        if ($request->isMethod('POST')) {
            // Récupérez les données du formulaire
            $nomPrenom = $request->request->get('nom_prenom');
            $email = $request->request->get('email');
            $telephone = $request->request->get('telephone');
            $message = $request->request->get('message');

            // Créez l'e-mail
            $email = (new Email())
                ->from('votre_email@example.com')
                ->to('destinataire@example.com')
                ->subject('Nouveau message de contact')
                ->html("<p>Nom Prénom: $nomPrenom</p>
                        <p>Email: $email</p>
                        <p>Téléphone: $telephone</p>
                        <p>Message: $message</p>");

            // Envoyez l'e-mail
            $mailer->send($email);

            // Redirigez l'utilisateur vers une page de confirmation
            $this->addFlash('success','Merci ! Votre e-mail a bien été envoyé, nous vous recontacterons dans les meilleurs délais');
            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
