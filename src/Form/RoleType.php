<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Role;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rang',TextType::class,[
                'label'=>'Rang :',
                'label_attr'=>['class'=>'lab30 text-light'],
                'attr'=>['class'=>'form-control my-2 w-20 auto']
            ])
            ->add('libelle',TextType::class,[
                'label'=>'Libelle :',
                'label_attr'=>['class'=>'lab30 text-light'],
                'attr'=>['class'=>'form-control my-2 w-20 auto']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Role::class,
        ]);
    }
}
