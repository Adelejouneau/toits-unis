<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('plainPassword' , PasswordType::class, [
                'label'=>"Nouveau mot de passe",
                'mapped' => false,
                ])
            ->add('lastName')
            ->add('firstName')
            ->add('address', EntityType::class, [
                'class' => 'App\Entity\Address',
            ])
            ->add('phoneUser')
            ->add('imageNameUser')
            ->remove('updatedAt')
            ->add('gender')
            ->add('description', CKEditorType::class)
            // ->add('roles')
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
