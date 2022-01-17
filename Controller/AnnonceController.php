<?php
    
  require_once("Model/AnnonceModel.class.php");
  class AnnonceController{
    function getAnnonceValide(){
       $get = new AnnonceModel();
       $res = $get->getAnnonceValide();
       return $res;
    }   


 }



?>