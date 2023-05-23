<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidController extends AbstractController
{
    #[Route('/valid', name: 'app_valid')]
    public function index(): Response
    {
        return $this->render('valid/index.html.twig', [
            'controller_name' => 'ValidController',
        ]);
    }
}
