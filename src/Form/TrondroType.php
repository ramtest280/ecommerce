<?php

namespace App\Form;

use App\Entity\Trondro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrondroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('anarana', TextType::class, [
                'attr' => [
                    'class' => 'form-control border b-4 w-100',
                    'placeholder' => 'Nom du produit...'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trondro::class,
        ]);
    }
}
