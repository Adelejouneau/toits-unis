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

            ->add('titleLod',null,[
                'label' => 'Titre de l\'annonce',
                ])

            ->add('addressLod',null,[
                'label' => 'Adresse',
                ])
            
            ->add('zipCodeLod',null,[
                'label' => 'Code postal',
                ])

            ->add('cityLod',null,[
                'label' => 'Ville',
                ])

            ->add('department', EntityType::class, [
                'class' => 'App\Entity\Department',
                'choice_label' => 'nameDepartment',
                'label' => 'Département',
            ])

            ->add('category', EntityType::class, [
                'class' => 'App\Entity\Category',
                'choice_label' => 'nameCat',
                'label' => 'Catégorie d\'hébergement',
            ])

            ->add('descriptionLod', CKEditorType::class, [
                'label' => 'Description de l\'hébergement',
                ])
            
            ->add('host', EntityType::class, [
                'class' => 'App\Entity\Host',
                'choice_label' => 'lastName',
                'label' => 'Hôte',
            ])

            ->remove('imageNameLod')
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => "Télécharger des photos",
            ])
            ->remove('slugLod')
    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lodging::class,
        ]);
    }
}
