<?php

namespace App\Form;

use App\Entity\User;
use App\Form\LodgingType;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('emailAsso')
            ->add('plainPassword' , PasswordType::class, [
                'label'=>"Nouveau mot de passe",
                'mapped' => false,
                'required'=>false,
                ])
            ->add('nameAsso', null, [
                'label' => 'Nom',
                ])
            ->add('immatriculationAsso', null, [
                'label' => 'immatriculation',
                ])
            ->add('websiteUrl', null, [
                'label' => 'Numéro de téléphone',
                ])
            ->remove('imageNameUser')
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => "Image de l'association",
            ])
            ->remove('updatedAt', DateTimeType::class, [
                'widget' => 'single_text',
                'data' => new \DateTimeImmutable(),
            ])
            ->add('descriptionAsso', CKEditorType::class)
            ->remove('roles', ChoiceType::class, [
                'choices' =>[
                'utilisateur' => 'user',
                'Asso' => 'asso',
            ],
                    'label' => 'Rôles',
                    'required' => true,
                    'mapped' => false,
                    ])
            ->add('phoneNumberAsso')
            ->add('department', EntityType::class, [
                'class' => Address::class,
                'choice_label' => 'department',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Département',
            ])
        //     ->add('lodgings', CollectionType::class, [
        //     'entry_type' => LodgingType::class,
        //     'allow_add' => true,
        //     'label'=>false,
        // ])
            // ->add('entreprise', null, [
            //     'label' => 'Entreprise (facultatif)',
            //     ])
            // ->add('fonction', null, [
            //     'label' => "Fonction dans l'entreprise (facultatif)",
            //     ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
