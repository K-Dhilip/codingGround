<?php
namespace  App\Metier ;



class Artisans
    
{

  private $artisans ;


 public function __construct () {

    $this->artisans = []; 
    $this->artisans[] = New Artisan('Toto','blep','baker'); 
   


 }

 function getliste(){
    return $this->artisans();
 }

}






?>

