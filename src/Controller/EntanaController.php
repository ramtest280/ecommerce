<?php

namespace App\Controller;

use App\Entity\Entana;
use App\Form\EntanaType;
use App\Repository\EntanaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntanaController extends AbstractController
{
    /**
     * @Route("/", name="calcul_produits")
     */
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $entana = new Entana();
        $form = $this->createForm(EntanaType::class, $entana);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // Calcul Total 
            // Total = Lanjany * Vidin'Iray
            $entana->setTotal($entana->getLanjany() * $entana->getVidiniray());

            // Calcul Reste 
            // Reste = Total - Avance
            $entana->setReste($entana->getTotal() - $entana->getAvance());

            // Facon d'automatiser la date de creation des entana
            $entana->setCreatedAt(new \DateTimeImmutable());

            $em->persist($entana);
            $em->flush();

            $this->addFlash('success', 'Entana calculée avec succes');
            return $this->redirectToRoute('liste_produits');
        }

        return $this->render('entana/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/entana/liste", name="liste_produits")
     */
    public function listeEntana(EntanaRepository $entanaRepository)
    {
        $entana = $entanaRepository->findAll();

        return $this->render('entana/liste.html.twig', [
            'entana' => $entana,
        ]);
    }

    /**
     * @Route("entana/{id}/editer", name="editer_produits")
     */
    public function editer(Entana $entana, Request $request, EntanaRepository $entanaRepository, EntityManagerInterface $em): Response
    {


        $form = $this->createForm(EntanaType::class, $entana);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Calcul Total 
            // Total = Lanjany * Vidin'Iray
            $entana->setTotal($entana->getLanjany() * $entana->getVidiniray());

            // Calcul Reste 
            // Reste = Total - Avance
            $entana->setReste($entana->getTotal() - $entana->getAvance());

            // Facon d'automatiser la date de creation
            $entana->setCreatedAt(new \DateTimeImmutable());


            $entanaRepository->add($entana, true);

            $this->addFlash('notice', 'Entana modifiée avec succes');
            return $this->redirectToRoute('liste_produits');
        }

        return $this->renderForm('entana/editer.html.twig', [
            'entana' => $entana,
            'form' => $form,
        ]);
    }
}
