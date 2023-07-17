<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;


class RegistrationAssoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('email')
        ->add('plainPassword' , PasswordType::class, [
            'label'=>"Nouveau mot de passe",
            'mapped' => false,
            'required'=>false,
            ])
        ->add('nameAsso', null, [
            'label' => 'Nom de l\'association',
            ])
        ->add('immatriculationAsso', null, [
            'label' => 'Numéro d\'immatriculation',
            ])
        ->add('websiteUrl', null, [
            'label' => 'Site web',
            ])
        ->remove('imageNameAsso')
        ->add('imageFile', FileType::class, [
            'required' => false,
            'label' => "Logo de votre association",
        ])
        ->remove('updatedAt', DateTimeType::class, [
            'widget' => 'single_text',
            'data' => new \DateTimeImmutable(),
        ])
        ->add('descriptionAsso', CKEditorType::class, [
            'label' => "Description de votre association",
        ])
        ->remove('roles', ChoiceType::class, [
            'choices' =>[
            'utilisateur' => 'user',
            'Asso' => 'asso',
        ],
                'label' => 'Rôles',
                'required' => true,
                'mapped' => false,
                ])
        ->add('phoneNumberAsso', null, [
            'label' => 'Numéro de téléphone',
            ])
        // ->add('department', EntityType::class, [
        //     'class' => Department::class,
        //     'choice_label' => 'department',
        //     'multiple' => true,
        //     'expanded' => true,
        //     'label' => 'Département',
        // ])
        ->add('agreeTerms', CheckboxType::class, [
            'label'=>"J'accepte les conditions d'utilisation",
            'mapped' => false,
            'constraints' => [
                new IsTrue([
                    'message' => 'Vous devez accepter les conditons d\'utilisation.',
                ]),
            ],
        ])
        ->add('plainPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'options' => ['attr' => ['class' => 'password-field']],
            'required' => true,
            'first_options'  => ['label' => 'Mot de passe'],
            'second_options' => ['label' => 'Confirmer le mot de passe'],
            'invalid_message' => 'Les mots de passe ne correspondent pas',
            'constraints' => [
                new NotBlank([
                    'message' => 'Entrez un mot de passe',
                ]),
                new Length([
                    'min' => 4,
                    'minMessage' => 'Votre message devrait comporter au moins {{ limit }} caractères.',
                    // max length allowed by Symfony for security reasons
                    'max' => 4096,
                ]),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
