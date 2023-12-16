<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Form\LivraisonType;
use App\Repository\LivraisonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/livraison")
 */
class LivraisonController extends AbstractController
{
    /**
     * @Route("/", name="creation_livraison")
     */
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $livraison = new Livraison();
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livraison->setCreatedAt(new \DateTimeImmutable());

            $em->persist($livraison);
            $em->flush();

            return $this->redirectToRoute('liste_livraison');
        }

        return $this->render('livraison/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/liste", name="liste_livraison")
     */
    public function listeLivraison(LivraisonRepository $livraisonRepository): Response
    {
        $livraison = $livraisonRepository->findAll();

        return $this->render('livraison/liste.html.twig', [
            'livraison' => $livraison,
        ]);
    }
}
