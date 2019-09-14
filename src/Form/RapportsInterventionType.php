<?php

namespace App\Form;

use App\Entity\Equipements;
use App\Entity\RapportsIntervention;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RapportsInterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Libelle_rapport', TextareaType::class)
            ->add('Photo', FileType::class)
            ->add('Piece_jointe', FileType::class)
            ->add('Date_fin' , TextType::class)
            ->add('Equipement', EntityType::class, [
                'class' => Equipements::class,
                'choice_label' => 'type',
                'placeholder' =>"selectionnez le type d'equipement",
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RapportsIntervention::class,
            'class' => 'AppBundle\Entity\RapportsIntervention',
        ]);
    }

}
