<?php
namespace  App\Metier ;



class Artisan
    
{



  private $nom, $prenom, $metier;

  public function __construct ($nom, $prenom, $metier) {
    $this->$nom = $nom;
    $this->$prenom = $prenom;
    $this->$metier = $metier;

   


 }




  public function getNom() : ?string
  {
    
    return $this->$nom ;
  }
  public function setNom($nom) {
    $this->nom = $nom;
  }
  
  public function getPrenom(): ?string
  {
    return $this->$prenom;
  }
  public function setPrenom($prenom) {
    $this->prenom = $prenom;
  }
  public function getMetier(): ?string
  {
    return $this->$metier;
  }
  public function setMetier($metier) {
    $this->metier = $metier;
  }
}







?>

