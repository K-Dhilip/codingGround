<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BootCheckController extends AbstractController
{
    #[Route('/boot/check/{profil}', name: 'app_boot_check')]
    public function index($profil): Response
    {
$profil = "Hello Dhilip";
        return $this->render('boot_check/index.html.twig', [
            'controller_name' => 'BootCheckController',
 'profile' => 'Dhilip',
        ]);
    }
}
