<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Data\Util\Locales;
use Symfony\Component\Intl\Languages;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function formToConnect()
    {
\locale::setDefault('fr');
$pays = Countries::getNames();
$langes = Languages::getNames();


    $form = $this->createFormBuilder()
    ->add('nom', TextType::class)
    ->add('mail', EmailType::class)
    ->add('motDePasse', RepeatedType::class)
    ->add('age', IntegerType::class)
    ->add('jourAnniversaire',BirthdayType::class)
    ->add('solde',MoneyType::class)
    ->add('pourcentage',PercentType::class)
    ->add('pays',ChoiceType::class,  ['choices' =>array_flip($pays)])
    ->add('langues',ChoiceType::class,  ['choices' =>array_flip($langes)])
    ->add('Ajouter',SubmitType::class,['attr'=> ['class' => "btn-success"]])
    ->add('annuler',ResetType::class, ['attr'=> ['class' => "btn-danger"]])
    ->getForm();
    $request = Request::createFromGlobals(); // sauf si en paramètre de la
    //méthode,on a Request $request
    $form->handleRequest($request) ;
    // Le visiteur a appuyé sur le bouton Valider
    // et les données saisies sont conformes à la validation des champs
    if ($form->isSubmitted() && $form->isValid()) {
    $data = $form->getData() ;
    // Traitement du formulaire
    return $this->render('connexion/index.html.twig',
    array('data'=>$data));
    }
    // Affichage du formulaire
    return $this->render('connexion/index.html.twig',
    ['form'=>$form->createView()]);
    }
}
