<?php

namespace App\Controller;

use App\Entity\Entana;
use App\Form\EntanaType;
use App\Repository\EntanaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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
    public function listeEntana(Request $request, EntanaRepository $entanaRepository, PaginatorInterface $paginatorInterface)
    {
        $entana = $entanaRepository->findAll();
        $entana = $paginatorInterface->paginate(
            // $entanaRepository->findAll(),
            $entana,
            $request->query->getInt('page', 3),
            10
        );

        return $this->render('entana/liste.html.twig', [
            'produits' => $entana,
            'pagination' => $entana
        ]);
    }

    /**
     * @Route("entana/{id}/editer", name="editer_produits")
     */
    public function editer(Entana $entana, Request $request, EntanaRepository $entanaRepository): Response
    {
        $form = $this->createForm(EntanaType::class, $entana);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

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
