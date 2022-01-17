<?php
    
  require_once("../Model/AnnonceModel.class.php");
  class AnnonceController{
    function getAnnonceValide(){
       $get = new AnnonceModel();
       $results = $get->getAnnonceValide();
       echo $results;
       return $results;
    }   


 }



?>