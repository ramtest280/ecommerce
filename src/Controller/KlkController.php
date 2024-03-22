<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KlkController extends AbstractController
{
    #[Route('/klk', name: 'app_klk')]
    public function index(): Response
    {
        return $this->render('klk/index.html.twig', [
            'controller_name' => 'KlkController',
        ]);
    }
}
