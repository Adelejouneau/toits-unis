<?php

namespace App\Form;

use App\Entity\Lodging;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class LodgingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->remove('imageNameLod')
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => "Télécharger des photos",
            ])
            ->add('user_id')
            ->remove('slugLod')
            ->add('titleLod',null,[
                'label' => 'Titre de l\'annonce',
                ])

            ->add('category', EntityType::class, [
                'class' => 'App\Entity\Category',
                'choice_label' => 'nameCat',
                'label' => 'Catégorie d\'hébergement',
            ])
            ->add('department', EntityType::class, [
                'class' => 'App\Entity\Department',
                'choice_label' => 'nameDepartment',
                'label' => 'Département',
            ])
            ->add('descriptionLod', CKEditorType::class, [
                'label' => 'Description de l\'hébergement',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lodging::class,
        ]);
    }
}
