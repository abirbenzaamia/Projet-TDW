<?php
    
  require_once("Model/AnnonceModel.class.php");
  class AnnonceController{
    function getAnnonceValide(){
       $annonceMdl = new AnnonceModel();
       $res = $annonceMdl->getAnnonceValide();
       return $res;
    }   


 }



?>