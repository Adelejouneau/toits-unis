<?php

namespace App\Form;

use App\Entity\Equipement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cuisine', ChoiceType::class, [
                'choices' => [
                    'Micro-onde' => 'microOnde',
                    'Couverts' => 'couverts',
                    'Plaque de cuisson' => 'plaqueDeCuisson',
                    // Ajoutez ici d'autres éléments de cuisine disponibles
                ],
                'multiple' => true,
                'attr'=>[
                    "class" =>"select2"  
                    ]
            ])
            
            ->add('sanitaire', ChoiceType::class, [
                'choices' => [
                    'Toilette' => 'toilette',
                    'Lavabo' => 'lavabo',
                    'Douche' => 'douche',
                    // Ajoutez ici d'autres éléments de cuisine disponibles
                ],
                'multiple' => true,
                'attr'=>[
                    "class" =>"select2"  
                    ]
            ])
            
            ->add('couchage', ChoiceType::class, [
                'choices' => [
                    'lit' => 'lit',
                    'Canape lit' => 'canapeLit',
                    'Autre couchage' => 'autreCouchage',
                    // Ajoutez ici d'autres éléments de cuisine disponibles
                ],
                'multiple' => true,
                'attr'=>[
                    "class" =>"select2"  
                    ]
            ])
            
            ->add('nbrDeLit')

            ->add('lodging')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipement::class,
        ]);
    }
}
