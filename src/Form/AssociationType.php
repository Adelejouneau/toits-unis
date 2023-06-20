<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\Association;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class AssociationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameAsso')
            ->add('descriptionAsso', CKEditorType::class)
            ->add('websiteUrl')
            ->remove('imageNameAsso')
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => "Image de l'association",
            ])
            ->remove('updatedAt', DateTimeType::class, [
                'widget' => 'single_text',
                'data' => new \DateTimeImmutable(),
            ])
            ->add('phoneNumberAsso')
            ->add('emailAsso')
            ->remove('slugAsso')
            ->add('address', EntityType::class, [
    'class' => 'App\Entity\Address',
    'multiple' => true,
    'expanded' => true,
    'choice_label' => function (Address $address) {
    }
    ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Association::class,
        ]);
    }
}
