<?php

namespace App\Form;

use App\Entity\Entana;
use App\Entity\Etat;
use App\Entity\Fournisseur;
use App\Entity\Stock;
use App\Entity\Trondro;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Poids', NumberType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Prix_unitaire', MoneyType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Prix_en_vente', MoneyType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Etat', EntityType::class, [
                'class' => Etat::class,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Trondro', EntityType::class, [
                'class' => Trondro::class,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Fournisseur', EntityType::class, [
                'class' => Fournisseur::class,
                'attr' => [
                    'class' => 'form-control'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stock::class,
        ]);
    }
}
