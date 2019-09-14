<?php

namespace App\Form;

use App\Entity\Villes;
use App\Entity\Agences;
use App\Entity\Interventions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InterventionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle_intervention')
            ->add('nom_agence', EntityType::class, [
                'class' => Agences::class,
                'choice_label' => 'nom_agence',
                'placeholder' =>"nom de l'agence",
                'mapped' => false,
                'required' => false
            ])
            ->add('nom_ville', EntityType::class, [
               'class' => Villes::class,
               'choice_label' => 'nom_ville',
               'placeholder' =>"nom de la ville",
               'mapped' => false,
               'required' => false
           ])
            ->add('date_debut')
            -> add ( 'Etat')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Interventions::class,
        ]);
    }
}
