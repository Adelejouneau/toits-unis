<?php

namespace App\Form;

use App\Entity\User;
// use App\Form\RegistrationHostFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationHostFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('lastName')
            ->add('firstName')
            ->add('phoneUser', null,[
                'label'=>"Téléphone",
            ])
            ->add('email')
            ->add('agreeTerms', CheckboxType::class, [
                'label'=>"J'accepte les conditions d'utilisation",
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les conditons d\'utilisation.',
                    ]),
                ],
            ])
            ->remove('plainPassword', RepeatedType::class, [
    'type' => PasswordType::class,
    'options' => ['attr' => ['class' => 'password-field']],
    'required' => true,
    'first_options'  => ['label' => 'Mot de passe'],
    'second_options' => ['label' => 'Confirmer le mot de passe'],
    'invalid_message' => 'Les mots de passe ne correspondent pas',
]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
