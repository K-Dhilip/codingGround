<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Message;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
   

    public function message(Message $message): Response
    {
        
        $monMessage = $message->getMessage();
        return new Response($monMessage);
        
    }

}



