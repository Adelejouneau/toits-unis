<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationAssoFormType;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;
    private ValidatorInterface $validator;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    #[Route('/register_asso', name: 'app_register_asso')]
    public function registerAsso(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $user = new User();
        
        $form = $this->createForm(RegistrationAssoFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Vérifier si l'adresse e-mail existe déjà
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    
                    $user,
                    $form->get('plainPassword')->getData()
                )
                
            );
            
            //On ajoute un role à l'utilisateur
            $user->setRoles(['ROLE_USER']);
            $entityManager->persist($user);
            $entityManager->flush();
            

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('mailer@toitsUnis.com', 'toitsUnis'))
                    ->to($user->getEmail())
                    ->subject('Confirmation de votre e-mail')
                    ->htmlTemplate('registration_asso/confirmation_asso_email.html.twig')
            );
            
            $this->addFlash('success','Inscription réussie, vous devez valider votre compte via le mail reçu.');
            return $this->redirectToRoute('app_register_asso');
        }
        
        return $this->render('registration_asso/register_asso.html.twig', [
            'registrationAssoForm' => $form->createView(),
        ]);
    }

        #[Route('/verify/email', name: 'app_verify_email')]
        public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
        {
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
    
            // validate email confirmation link, sets User::isVerified=true and persists
            try {
                $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
            } catch (VerifyEmailExceptionInterface $exception) {
                $this->addFlash('danger', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));
    
                return $this->redirectToRoute('app_register_asso');
            }
    
    
            return $this->redirectToRoute('app_login');
        }
    }
