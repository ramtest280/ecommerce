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
            ->add('lanjany', NumberType::class)
            ->add('vidiniray', MoneyType::class)
            ->add('avance', MoneyType::class)
            ->add('trondro', EntityType::class,[
                'class' => Trondro::class,
            ])
            ->add('client', EntityType::class,[
                'class' => Client::class,
            ])
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entana::class,
        ]);
    }
}
