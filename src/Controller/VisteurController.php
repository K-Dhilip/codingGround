<?php

namespace App\Controller;

use App\Repository\VisiteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VisteurController extends AbstractController
{
    #[Route('/visteur', name: 'app_visteur')]
    public function index(VisiteurRepository $rp): Response
    {
        return $this->render('visteur/index.html.twig', [
            'visiteur' => $rp->findAll(),
                ]);
    }
}
