<?php

namespace App\Form;

use App\Entity\GroupeCursus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class GroupeCursusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numGroupeCursus',TextType::class,[
                'label'=>'Numéro Groupe Cursus :',
                'label_attr'=>['class'=>'lab30 text-light'],
                'attr'=>['class'=>'form-control my-2 w-20 auto']
            ])
            ->add('dateDebutGroupeCursus', DateType::class, [
                'widget' => 'choice',
                'label'=>'Date Début :',
                'label_attr'=>['class'=>'lab30 text-light'],
                'attr'=>['class'=>'datepicker my-2 w-20 auto']
            ])
            ->add('dateFinGroupeCursus', DateType::class, [
                'widget' => 'choice',
                'label'=>'Date Fin :',
                'label_attr'=>['class'=>'lab30 text-light'],
                'attr'=>['class'=>'my-2 w-20 auto']
            ])
            ->add('cursus_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GroupeCursus::class,
        ]);
    }
}
