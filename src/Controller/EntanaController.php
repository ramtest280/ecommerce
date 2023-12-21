<?php

namespace App\Controller;

use App\Entity\Entana;
use App\Entity\Produit;
use App\Form\EntanaType;
use App\Repository\EntanaRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntanaController extends AbstractController
{
    /**
     * @Route("/", name="calcul_entana")
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

            // Facon d'automatiser la date de creation
            $entana->setCreatedAt(new \DateTimeImmutable());

            $em->persist($entana);
            $em->flush();

            return $this->redirectToRoute('liste_entana');
        }

        return $this->render('entana/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/entana/liste", name="liste_entana")
     */
    public function listeEntana(EntanaRepository $entanaRepository)
    {
        $entana = $entanaRepository->findAll();

        return $this->render('entana/liste.html.twig', [
            'entana' => $entana,
        ]);
    }

    /**
     * @Route("entana/{id}/editer", name="editer_entana")
     */
    public function editer(Entana $entana, Request $request, EntanaRepository $entanaRepository): Response
    {
        $form = $this->createForm(EntanaType::class, $entana);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entanaRepository->add($entana, true);
            // Calcul Total 
            // Total = Lanjany * Vidin'Iray
            $entana->setTotal($entana->getLanjany() * $entana->getVidiniray());

            // Calcul Reste 
            // Reste = Total - Avance
            $entana->setReste($entana->getTotal() - $entana->getAvance());

            // Facon d'automatiser la date de creation
            $entana->setCreatedAt(new \DateTimeImmutable());
            return $this->redirectToRoute('liste_entana');
        }

        return $this->renderForm('entana/editer.html.twig', [
            'entana' => $entana,
            'form' => $form,
        ]);
    }
}
