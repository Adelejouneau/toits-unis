<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationGuestFormType;
use App\Form\RegistrationHostFormType;
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
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;


class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    // Route pour le formulaire d'inscription d'un hôte
    #[Route('/register_host', name: 'app_register_host')]
    public function registerHost(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $registrationHostForm = $this->createForm(RegistrationHostFormType::class, $user);
        $registrationHostForm->handleRequest($request);

        if ($registrationHostForm->isSubmitted() && $registrationHostForm->isValid()) {
            // Check if a user with the same email already exists
            $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);
            if ($existingUser) {
                $this->addFlash('danger', 'Un utilisateur avec cette adresse e-mail existe déjà.');
                return $this->redirectToRoute('app_register_host');
            }

            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $registrationHostForm->get('plainPassword')->getData()
                )
            );
            $user->setRoles(['ROLE_HOST']);
            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('mailer@toitsUnis.com', 'toitsUnis'))
                    ->to($user->getEmail())
                    ->subject('Confirmation de votre e-mail')
                    ->htmlTemplate('registration_host/confirmation_host_email.html.twig')
            );
            // do anything else you need here, like send an email
            $this->addFlash('success','Inscription réussie, validez votre compte via le mail reçu.');
            return $this->redirectToRoute('app_register_host');
        }
        
        return $this->render('registration_host/register_host.html.twig', [
            'registrationHostForm' => $registrationHostForm->createView(),
        ]);
    }



    #[Route('/register_guest', name: 'app_register_guest')]
    public function registerGuest(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationGuestFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Vérifier si l'adresse e-mail existe déjà
            $existingUser = $entityManager->getRepository(User::class)->findOneBy([
                'email' => $user->getEmail(),
            ]);

            if ($existingUser) {
                $this->addFlash('danger', 'Cette adresse e-mail est déjà utilisée.');

                return $this->redirectToRoute('app_register_guest');
            }

            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setRoles(['ROLE_GUEST']);
            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('mailer@toitsUnis.com', 'toitsUnis'))
                    ->to($user->getEmail())
                    ->subject('Confirmation de votre e-mail')
                    ->htmlTemplate('registration_guest/confirmation_guest_email.html.twig')
            );
            
            $this->addFlash('success','Inscription réussie, vous devez valider votre compte via le mail reçu.');
            return $this->redirectToRoute('app_register_guest');
        }
        
        return $this->render('registration_guest/register_guest.html.twig', [
            'registrationGuestForm' => $form->createView(),
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
    
                return $this->redirectToRoute('app_login');
            }
    
            // @TODO Change the redirect on success and handle or remove the flash message in your templates
            $this->addFlash('success', 'Votre e-mail a bien été vérifié. Vous pouvez finaliser votre compte');
    
            return $this->redirectToRoute('app_login');
        }
    }
