<?php

namespace App\Form;

use App\Entity\Equipement;
use App\Entity\Lodging;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('typeEquip', null, [
                'label' => 'Type d\'équipement',
                ])
            ->add('descriptionEquip', null, [
                'label' => 'Description de l\'équipement',
                'attr'=>[
                    "class" =>"select2"  
                    ], 'multiple' => true,

                ])


            // ->add('couchage', ChoiceType::class, [
            //     'choices' => [
            //         'lit' => 'lit',
            //         'Canape lit' => 'canapeLit',
            //         'Autre couchage' => 'autreCouchage',
            //         // Ajoutez ici d'autres éléments de cuisine disponibles
            //     ],
            //     'multiple' => true,
            //     'attr'=>[
            //         "class" =>"select2"  
            //         ]
            // ])
            
            // ->add('nbrDeLit')

            // ->add('lodging')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipement::class,
        ]);
    }
}
