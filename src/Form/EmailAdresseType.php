<?php

namespace App\Form;

use App\Entity\EmailAdresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmailAdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('EmailAdresse')
            ->add('DateEnreg')
            ->add('DateFin')
            ->add('Status')
            ->add('Personne')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EmailAdresse::class,
        ]);
    }
}
