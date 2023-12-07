<?php

namespace App\Controller;

use App\Entity\Entana;
use App\Entity\Produit;
use App\Form\EntanaType;
use App\Repository\EntanaRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntanaController extends AbstractController
{
    /**
     * @Route("/entana", name="calcul_entana")
     */
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $entana = new Entana();

        $form = $this->createForm(EntanaType::class, $entana);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entana->setTotal($entana->getLanjany() * $entana->getVidiniray());
            $entana->setReste($entana->getTotal() - $entana->getAvance());

            $entana->setCreatedAt(new \DateTimeImmutable());

            $em->persist($entana);
            $em->flush();

            return $this->redirectToRoute('liste_entana');
        }

        return $this->render('entana/cree.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/entana/liste", name="liste_entana")
     */
    public function listeEntana(EntityManagerInterface $em, EntanaRepository $erp)
    {
        $entana = $erp->findAll();

        return $this->render('entana/liste.html.twig', [
            'entana' => $entana,
        ]);
    }
}
