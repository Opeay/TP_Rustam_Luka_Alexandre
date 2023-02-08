<?php

namespace App\Form;

use App\Entity\Cursus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class CursusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle',TextType::class,[
                'label'=>'Libellé',
                'label_attr'=>['class'=>'lab20'],
                'attr'=>['class'=>'form-control w-100 m-2']
            ])
            ->add('typeCursus', ChoiceType::class, [
                'choices'  => [
                    'A temps plein' => true,
                    'En alternance' => false,
                ],
                'label'=>'Formation',
                'label_attr'=>['class'=>'lab20'],
                'attr'=>['class'=>'form-control w-100 m-2']
            ])
            ->add('descriptionCursus',TextType::class,[
                'label'=>'Description',
                'label_attr'=>['class'=>'lab20'],
                'attr'=>['class'=>'form-control w-100 m-2']
            ])
            ->add('prixCursus',TextType::class,[
                'label'=>'Prix Cursus',
                'label_attr'=>['class'=>'lab20'],
                'attr'=>['class'=>'form-control w-100 m-2']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cursus::class,
        ]);
    }
}
