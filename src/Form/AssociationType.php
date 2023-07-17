<?php

namespace App\Form;

use App\Entity\Association;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AssociationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameAsso')
            ->add('immatriculationAsso')
            ->add('descriptionAsso', CKEditorType::class)
            ->add('websiteUrl')
            ->remove('imageNameAsso')
            ->add('imageFile', VichFileType::class, [
                'required' => false,
                'label' => "Logo de l'association",
            ])
            ->remove('updatedAt', DateTimeType::class, [
                'widget' => 'single_text',
                'data' => new \DateTimeImmutable(),
            ])
            
            ->add('phoneNumberAsso')
            ->add('emailAsso')
            ->remove('slugAsso')
            ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Association::class,
        ]);
    }
}