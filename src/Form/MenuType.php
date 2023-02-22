<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Role;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rang',TextType::class,[
                'label'=>'Ordre',
                'label_attr'=>['class'=>'lab30'],
                'attr'=>['class'=>'form-control w-20 auto my-2']
            ])
            ->add('libelle',TextType::class,[
                'label'=>'Libelle',
                'label_attr'=>['class'=>'lab30'],
                'attr'=>['class'=>'form-control w-20 auto my-2']
            ])
            ->add('route',TextType::class,[
                'label'=>'Route',
                'required'=>false,
                'label_attr'=>['class'=>'lab30'],
                'attr'=>['class'=>'form-control w-20 auto my-2']
            ])
            ->add('role',EntityType::class,[
                'class'=>Role::class,
                'required'=>false,
                'label'=>'Role',
                'label_attr'=>['class'=>'lab30'],
                'attr'=>['class'=>'form-select w-20 auto my-2']
            ])
            ->add('parent',EntityType::class,[
                'class'=>Menu::class,
                'required'=>false,
                'label'=>'Parent',
                'label_attr'=>['class'=>'lab30'],
                'attr'=>['class'=>'form-select w-20 auto my-2']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }
}
