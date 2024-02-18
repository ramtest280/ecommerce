<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Entana;
use App\Entity\Trondro;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntanaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lanjany', NumberType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom du trondro...'
                ]
            ])
            ->add('vidiniray', MoneyType::class, [
                'currency' => 'MGA',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('avance', MoneyType::class, [
                'currency' => 'MGA',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('trondro', EntityType::class, [
                'class' => Trondro::class,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'attr' => [
                    'class' => 'form-control'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entana::class,
        ]);
    }
}
