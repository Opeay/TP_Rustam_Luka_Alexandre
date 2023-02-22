<?php

namespace App\Form;

use App\Entity\TypePersonne;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypePersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Description', TextType::class,[
                'label' => 'Description',
                'label_attr'=>['class' => 'lab-30 text-info'],
                'attr' => ['class' => 'form-control w-30']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypePersonne::class,
        ]);
    }
}
