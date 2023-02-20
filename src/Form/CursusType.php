<?php

namespace App\Form;

use App\Entity\Cursus;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
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
                'label_attr'=>['class'=>'lab30 text-light'],
                'attr'=>['class'=>'form-control my-2 w-20 auto']
            ])
            ->add('typeCursus', ChoiceType::class, [
                'choices'  => [
                    'A temps plein' => true,
                    'En alternance' => false,
                ],
                'label'=>'Formation',
                'label_attr'=>['class'=>'lab30 text-light'],
                'attr'=>['class'=>'form-control my-2 w-20 auto']
            ])
            ->add('descriptionCursus',CKEditorType::class,[
                'label'=>'Description',
                'label_attr'=>['class'=>'lab30 text-light'],
                'attr'=>['class'=>'form-control my-2 w-20 auto']
            ])
            ->add('prixCursus',TextType::class,[
                'label'=>'Prix Cursus',
                'label_attr'=>['class'=>'lab30 text-light mt-3'],
                'attr'=>['class'=>'form-control my-3 w-20 auto']
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
