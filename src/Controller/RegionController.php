<?php

namespace App\Controller;
use App\Repository\RegionRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegionController extends AbstractController
{
    #[Route('/regions', name: 'app_regions')]


  

    public function index(RegionRepository $rp): Response
    {
        return $this->render('region/index.html.twig', [
            'regions' => $rp->findAll(),
        ]);
    }
}
