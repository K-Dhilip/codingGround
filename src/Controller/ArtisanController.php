<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Metier\Artisans;

class ArtisanController extends AbstractController
{
    #[Route('/artisan', name: 'app_artisan')]
    public function Artisan(Artisans $artisans): Response
    {
        
        return $this->render('artisan/index.html.twig', [
            'liste' => $artisans
        ]);
    }


    
   
}
