<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TestController extends AbstractController
{
 

    #[Route('/test/myforward', name: 'app_my_forward')]
    public function myforward(): Response
    {
        return new Response('Forward') ;;
    }


    #[Route('/test/redirection', name: 'app_redirection')]
    public function redirection(): Response
    {
        return $this->redirectToRoute('app_my_forward') ;
    }


       }


