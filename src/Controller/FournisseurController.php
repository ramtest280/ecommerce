<?php

namespace App\Controller;

use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use App\Repository\FournisseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fournisseur")
 */
class FournisseurController extends AbstractController
{
    /**
     * @Route("/ajouter", name="creation_fournisseur")
     */
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $fournisseur = new Fournisseur();
        $form = $this->createForm(FournisseurType::class, $fournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($fournisseur);
            $em->flush();

            return $this->redirectToRoute('liste_fournisseur', [], Response::HTTP_SEE_OTHER);
        }


        return $this->render('fournisseur/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/", name="liste_fournisseur")
     */
    public function liste(FournisseurRepository $fournisseurRepository): Response
    {
        return $this->render('fournisseur/liste.html.twig', [
            'Fournisseur' => $fournisseurRepository->findAll()
        ]);
    }

    /**
     * @Route("/{id}/editer", name="editer_fournisseur", methods={"GET", "POST"})
     */
    public function edit(Request $request, Fournisseur $fournisseur, FournisseurRepository $fournisseurRepository): Response
    {
        $form = $this->createForm(FournisseurType::class, $fournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fournisseurRepository->add($fournisseur, true);

            return $this->redirectToRoute('liste_fournisseur', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fournisseur/edit.html.twig', [
            'Fournisseur' => $fournisseur,
            'form' => $form,
        ]);
    }
}
