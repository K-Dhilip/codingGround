<?php

namespace App\Controller;

use App\Entity\Visiteur;
use App\Form\VisiteurFormType;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use symfony\component\Validator\Validator\ValidatorInterface;



class FormbuilderController extends AbstractController
{
    #[Route('/formbuilder', name: 'app_formbuilder')]
   
   
    public function formToConnect()
    {
    $visiteur = new Visiteur();
    $form = $this->createForm(VisiteurFormType::class, $visiteur);

        $request = Request::createFromGlobals(); // sauf si en paramètre de la
    //méthode,on a Request $request
    $form->handleRequest($request) ;
    // Le visiteur a appuyé sur le bouton Valider
    // et les données saisies sont conformes à la validation des champs
    if ($form->isSubmitted() && $form->isValid()) {
    $data = $form->getData() ;
    // Traitement du formulaire
    return $this->render('formbuilder/index.html.twig',
    array('data'=>$data));
    }
    // Affichage du formulaire
    return $this->render('formbuilder/index.html.twig',
    ['form'=>$form->createView()]);
    }
    
    /*#[Route('/formbuilder', name: 'app_formbuilder')]
   
   
    public function formToConnect()
    {
    $errors = $validator->validate($nom);
    if(count($errors)>0){
        return new Response((string) $errors,400);
    } */
   
    public function index(): Response
    {
        return $this->render('formbuilder/index.html.twig', [
            'controller_name' => 'FormbuilderController',
        ]);
    }
}
