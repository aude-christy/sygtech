<?php

namespace App\Controller;

use App\Entity\Villes;
use App\Entity\Agences;
use App\Entity\Interventions;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\InterventionsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SygtechController extends AbstractController
{
    /**
     * @Route("/sygtech", name="sygtech")
     */
    public function index(InterventionsRepository $repo, Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(Interventions::class);

        $interventions = $repo->findAll();

        return $this->render('sygtech/index.html.twig', [
            'controller_name' => 'SygtechController',
            'interventions' => $interventions
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home() {
        return $this->render('sygtech/home.html.twig');
    }

    /**
     * @Route("/sygtech/new", name="sygtech_create")
     * @Route("/sygtech/{id}/edit", name="sygtech_edit")
     */
    public function create(Interventions $intervention = null, Request $request, EntityManagerInterface $em) {
        
       //var_dump($request);
        
       // $intervention = new Interventions();

        if(!$intervention) {
            $intervention = new Interventions();
        }

        $form = $this->createFormBuilder($intervention)
                     ->add('Libelle_intervention', TextType::class, [
                         'attr' => [
                             'placeholder' => "libelle de l'interevntion"
                         ]
                     ])
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
                     ->add('Date_debut', TextType::class, [
                        'attr' => [
                            'placeholder' =>"date debut de l'intervention"
                        ]
                    ])
                     
                    -> add ( 'Etat' , ChoiceType :: class , [
                        'choices'  => [
                            'Terminer' => null ,
                            'Yes' => true ,
                            'No' => false ,
                        ],
                    ])

                     ->getForm();


                     //var_dump($form);

       $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           // $intervention->setdatedebut($format = 'd/m/y', $max = 'now');

            $em->persist($intervention);
                $em->flush();


            return $this->redirectToRoute('sygtech_show', ['id' => $intervention->getId(),'interventions' => $intervention]);
        }

        return $this->render('sygtech/create.html.twig', [
            'formintervention' => $form->createView()
        ]);
    }

    /**
     * @Route("/sygtech/{id}", name="sygtech_show")
     */
    public function show($id){

        $repo = $this->getDoctrine()->getRepository(Interventions::class);

        $interventions = $repo->find($id);
        
        return $this->render('sygtech/show.html.twig',  ['interventions' => $interventions]);
    }

    
}
