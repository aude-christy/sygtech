<?php

namespace App\Form;

use App\Entity\Villes;
use App\Entity\Agences;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgencesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_agence')
            ->add('heure_ouverture')
            ->add('heure_fermeture')
            ->add('longitude')
            ->add('lattitude')
            ->add('villes', EntityType::class, [
                'class' => Villes::class,
                'choice_label' => 'nom_ville',
                'placeholder' =>"selectionnez la ville",
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Agences::class,
        ]);
    }
}
