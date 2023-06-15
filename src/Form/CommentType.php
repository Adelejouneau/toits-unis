<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('updatedAt', DateTimeType::class, [
                'widget' => 'single_text',
                'data' => new \DateTimeImmutable(),
            ])
            ->add('descriptionComment',  CKEditorType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
