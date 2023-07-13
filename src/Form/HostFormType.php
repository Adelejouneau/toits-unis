<?php

namespace App\Form;

use App\Entity\Host;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormView;

class HostFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', null, [
                'label' => 'Nom',
                ])
            ->add('firstName', null, [
                'label' => 'Prénom',
                ])
            ->add('phoneNumber', null, [
                'label' => 'Numéro de téléphone',
                ])
            ->add('email', null, [
                'label' => 'Email',
                ])
            ->add('address', null, [
                'label' => 'Adresse',
                ])
            ->add('zipCode', null, [
                'label' => 'Code postal',
                ])
            ->add('city', null, [
                'label' => 'Ville',
                ])
            ->add('entreprise', null, [
                'label' => 'Entreprise',
                ])
            ->add('fonction', null, [
                'label' => 'Fonction',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Host::class,
        ]);
    }
}
