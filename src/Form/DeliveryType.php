<?php

namespace App\Form;

use App\Entity\Delivery;
use App\Entity\Entana;
use App\Entity\Fournisseur;
use App\Entity\Trondro;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeliveryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('livreur', TextType::class)
            ->add('permis', ChoiceType::class, [
                'choices'  => [
                    'Misy' => true,
                    'Tsy misy' => false,
                ],
            ])
            ->add('frais', NumberType::class)
            ->add('colis', IntegerType::class)
            ->add('entana', EntityType::class, [
                'class' => Trondro::class,
            ]);
        /*->add('fournisseur', EntityType::class, [
                'class' => Fournisseur::class,
            ]);*/
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Delivery::class,
        ]);
    }
}
