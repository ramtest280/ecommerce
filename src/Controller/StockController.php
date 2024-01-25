<?php

namespace App\Controller;

use App\Entity\Stock;
use App\Form\StockType;
use App\Repository\StockRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/stock")
 */
class StockController extends AbstractController
{
    /**
     * @Route("/", name="ajout_stock")
     */
    public function index(Request $request, StockRepository $stockRepository): Response
    {
        $stock = new Stock();
        $form = $this->createForm(StockType::class, $stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $data = $form->getData();
            $stock->setCreatedAt(new DateTimeImmutable());
            $stockRepository->add($stock, true);
            $this->addFlash('success', 'Produit sauvergardé dans le stock');
            return $this->redirectToRoute('liste_stock');
        }
        return $this->render('stock/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/liste", name="liste_stock")
     */
    public function listeStock(StockRepository $stockRepository): Response
    {
        return $this->render('stock/liste_stock.html.twig', [
            'stock' => $stockRepository->findAll(),
        ]);
    }
}
