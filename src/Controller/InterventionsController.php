<?php

namespace App\Controller;

use App\Entity\Interventions;
use App\Form\InterventionsType;
use App\Repository\InterventionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/interventions")
 */
class InterventionsController extends AbstractController
{
    /**
     * @Route("/", name="interventions_index", methods={"GET"})
     */
    public function index(InterventionsRepository $interventionsRepository): Response
    {
        return $this->render('interventions/index.html.twig', [
            'interventions' => $interventionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="interventions_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $intervention = new Interventions();
        $form = $this->createForm(InterventionsType::class, $intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($intervention);
            $entityManager->flush();

            return $this->redirectToRoute('interventions_index');
        }

        return $this->render('interventions/new.html.twig', [
            'intervention' => $intervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="interventions_show", methods={"GET"})
     */
    public function show(Interventions $intervention): Response
    {
        return $this->render('interventions/show.html.twig', [
            'intervention' => $intervention,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="interventions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Interventions $intervention): Response
    {
        $form = $this->createForm(InterventionsType::class, $intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('interventions_index');
        }

        return $this->render('interventions/edit.html.twig', [
            'intervention' => $intervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="interventions_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Interventions $intervention): Response
    {
        if ($this->isCsrfTokenValid('delete'.$intervention->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($intervention);
            $entityManager->flush();
        }

        return $this->redirectToRoute('interventions_index');
    }
}
