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
     * @Route("/", name="trondro")
     */
    public function listTrondro(TrondroRepository $trondroRepository): Response
    {
        return $this->render('trondro/liste.html.twig', [
            'Trondro' => $trondroRepository->findAll(),
        ]);
    }


    /**
     * @Route("/ajouter", name="creation_trondro", methods={"GET", "POST"})
     */
    public function creationTrondro(Request $request, EntityManagerInterface $em): Response
    {
        $trondro = new Trondro();
        $form = $this->createForm(TrondroType::class, $trondro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($trondro);
            $em->flush();

            return $this->redirectToRoute('trondro', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trondro/ajout.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
