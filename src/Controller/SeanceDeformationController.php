<?php

namespace App\Controller;

use App\Entity\SeanceDeformation;
use App\Form\SeanceDeformationType;
use App\Repository\SeanceDeformationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/seance/deformation")
 */
class SeanceDeformationController extends AbstractController
{
    /**
     * @Route("/", name="seance_deformation_index", methods={"GET"})
     */
    public function index(SeanceDeformationRepository $seanceDeformationRepository): Response
    {
        return $this->render('seance_deformation/index.html.twig', [
            'seance_deformations' => $seanceDeformationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="seance_deformation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $seanceDeformation = new SeanceDeformation();
        $form = $this->createForm(SeanceDeformationType::class, $seanceDeformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($seanceDeformation);
            $entityManager->flush();

            return $this->redirectToRoute('seance_deformation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('seance_deformation/new.html.twig', [
            'seance_deformation' => $seanceDeformation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="seance_deformation_show", methods={"GET"})
     */
    public function show(SeanceDeformation $seanceDeformation): Response
    {
        return $this->render('seance_deformation/show.html.twig', [
            'seance_deformation' => $seanceDeformation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="seance_deformation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, SeanceDeformation $seanceDeformation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SeanceDeformationType::class, $seanceDeformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('seance_deformation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('seance_deformation/edit.html.twig', [
            'seance_deformation' => $seanceDeformation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="seance_deformation_delete", methods={"POST"})
     */
    public function delete(Request $request, SeanceDeformation $seanceDeformation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$seanceDeformation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($seanceDeformation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('seance_deformation_index', [], Response::HTTP_SEE_OTHER);
    }
}
