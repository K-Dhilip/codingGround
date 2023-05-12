<?php

namespace App\Controller;


use App\Entity\Visiteur;
use App\Entity\Region;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SetvisiteurController extends AbstractController
{
    #[Route('/setvisiteur', name: 'app_setvisiteur')]
    public function index(EntityManagerInterface $em): Response
    {

        $region = new Region();
        $region->setNom("Ile de france");
        $visiteur = new Visiteur();
        $visiteur->setNom("Mark");
        $visiteur->setPrenom("Antony");
        $visiteur->setCp("605010");
        $visiteur->setVille("Paris");

        $visiteur->addRegion($region);
        $em -> persist($region);
        $em -> persist($visiteur);
        $em -> flush();


        return $this->render('setvisiteur/index.html.twig', [
            'controller_name' => 'SetvisiteurController',
        ]);
    }
}
