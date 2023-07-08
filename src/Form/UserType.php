<?php

namespace App\Form;

use App\Entity\User;
use App\Form\LodgingType;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('email')
            ->add('plainPassword' , PasswordType::class, [
                'label'=>"Nouveau mot de passe",
                'mapped' => false,
                'required'=>false,
                ])
            ->add('lastName')
            ->add('firstName')
            ->add('address', EntityType::class, [
                'class' => 'App\Entity\Address',
            ])
            ->add('phoneUser')
            ->remove('imageNameUser')
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => "Image de l'association",
            ])
            ->remove('updatedAt')
            ->add('gender')
            ->remove('description', CKEditorType::class)
            ->remove('roles', ChoiceType::class, [
                'choices' =>[
                'utilisateur' => 'user',
                'Guest' => 'guest',
                'Host' => 'host'
            ],
                    'label' => 'Rôles',
                    'required' => true,
                    'mapped' => false,
                    ])
            ->add('lodgings', CollectionType::class, [
            'entry_type' => LodgingType::class,
            'allow_add' => true,
            'label'=>false,
        ]);
            // ->add('password')
            // ->add('isVerified')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
