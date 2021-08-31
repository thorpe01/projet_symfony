<?php

namespace App\Form;

use App\Entity\Series;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'label'=>'Title'
            ])
            ->add('overview',null,[
                'required'=> false,
            ])
            ->add('status',ChoiceType::class,[
                'choices'=>[
                    'cancelled'=>'cancelled',
                    'ended' => 'ended',
                    'returning'=>'returning'
                ],
                'multiple'=>false
            ])
            ->add('vote')
            ->add('popularity')
            ->add('genres')
            ->add('firstAirDate',DateType::class,[
                'html'=>true,
                'widget'=>'single_text',
            ])
            ->add('backdrop')
            ->add('poster')
            ->add('lastAirDate')
            ->add('tmdbId')


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Series::class,
        ]);
    }
}
