<?php

namespace App\Controller;

use App\Entity\Trondro;
use App\Form\TrondroType;
use App\Repository\TrondroRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/trondro")
 */
class TrondroController extends AbstractController
{
    /**
     * @Route("/ajouter", name="creation_trondro")
     */
    public function creationTrondro(Request $request, EntityManagerInterface $em): Response
    {
        $trondro = new Trondro();
        $form = $this->createForm(TrondroType::class, $trondro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($trondro);
            $em->flush();

            $this->redirectToRoute('liste_trondro', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trondro/creer.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="liste_trondro")
     */
    public function listTrondro(TrondroRepository $trondroRepository): Response
    {
        return $this->render('trondro/index.html.twig', [
            'Trondro' => $trondroRepository->findAll(),
        ]);
    }
}
