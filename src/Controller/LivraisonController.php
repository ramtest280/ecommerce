<?php

namespace App\Controller;

use App\Entity\Delivery;
use App\Form\DeliveryType;
use App\Form\LivraisonType;
use App\Repository\DeliveryRepository;
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
        $delivery = new Delivery();
        $form = $this->createForm(DeliveryType::class, $delivery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $delivery->setCreatedAt(new \DateTimeImmutable());

            $em->persist($delivery);
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
    public function listeLivraison(DeliveryRepository $deliveryRepository): Response
    {
        $delivery = $deliveryRepository->findAll();

        return $this->render('livraison/liste.html.twig', [
            'livraison' => $delivery,
        ]);
    }
}
