<?php

namespace App\Controller;

use App\Entity\RapportsIntervention;
use App\Form\RapportsInterventionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RapportsInterventionRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/rapports/intervention")
 */
class RapportsInterventionController extends AbstractController
{
    /**
     * @Route("/", name="rapports_intervention_index", methods={"GET"})
     */
    public function index(RapportsInterventionRepository $rapportsInterventionRepository): Response
    {
        return $this->render('rapports_intervention/index.html.twig', [
            'rapports_interventions' => $rapportsInterventionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rapports_intervention_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rapportsIntervention = new RapportsIntervention();
        $form = $this->createForm(RapportsInterventionType::class, $rapportsIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rapportsIntervention);
            $entityManager->flush();

            return $this->redirectToRoute('rapports_intervention_index');
        }

        return $this->render('rapports_intervention/new.html.twig', [
            'rapports_intervention' => $rapportsIntervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/upload", name="upload", methods={"POST"})
     *
     * @param Request $request
     *
     * @return JsonResponse|FormInterface
     */
    public function uploadAction(Request $request)
    {
        $form = $this->createForm(UploadType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()
                ->getRepository('AppBundle:RapportsIntervention')
                ->store($form->getData());

            return new JsonResponse([], 201);
        }

        return $form;
    }

    /**
     * @Route("/{id}", name="rapports_intervention_show", methods={"GET"})
     */
    public function show(RapportsIntervention $rapportsIntervention): Response
    {
        return $this->render('rapports_intervention/show.html.twig', [
            'rapports_intervention' => $rapportsIntervention,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rapports_intervention_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RapportsIntervention $rapportsIntervention): Response
    {
        $form = $this->createForm(RapportsInterventionType::class, $rapportsIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rapports_intervention_index');
        }

        return $this->render('rapports_intervention/edit.html.twig', [
            'rapports_intervention' => $rapportsIntervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rapports_intervention_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RapportsIntervention $rapportsIntervention): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rapportsIntervention->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rapportsIntervention);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rapports_intervention_index');
    }
}
