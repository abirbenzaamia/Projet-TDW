<?php
  session_start();  
        require_once("Model/GestionUtilisateursModel.vlass.php");       
 class GestionUtilisateursController{
    function  getListeClients (){  
       $gestionMdl = new GestionUtilisateursModel();
       $res = $gestionMdl->getListeClients();
       return $res;      
  }  

}

?>