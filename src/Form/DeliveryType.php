<?php

namespace App\Form;

use App\Entity\Delivery;
use App\Entity\Fournisseur;
use App\Entity\Trondro;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeliveryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('livreur', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('permis', ChoiceType::class, [
                'choices'  => [
                    'Misy' => true,
                    'Tsy misy' => false,
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('frais', MoneyType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('colis', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add(
                'Trondro',
                EntityType::class,
                [
                    'class' => Trondro::class,
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ]

            )
            ->add('fournisseur', EntityType::class, [
                'class' => Fournisseur::class,
                'attr' => [
                    'class' => 'form-control'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Delivery::class,
        ]);
    }
}
