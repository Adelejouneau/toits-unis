<?php

namespace App\Form;

use App\Entity\Lodging;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FilterHostAdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('department', null, [
                'label' => 'Département',
                ])
            ->add('Chercher', SubmitType::class)
            ->add('Reset', SubmitType::class,[
            'label' => 'Annuler le filtre'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lodging::class,
        ]);
    }
}
