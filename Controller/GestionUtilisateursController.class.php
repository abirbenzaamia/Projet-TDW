<?php
  session_start();  
        require_once("Model/GestionUtilisateursModel.class.php");   
        require_once("Model/ProfilUtilisateurModel.class.php");      
        require_once("View/GestionUtilisateursView.class.php"); 
 class GestionUtilisateursController{
    function  getListeClients (){  
       $gestionMdl = new GestionUtilisateursModel();
       $res = $gestionMdl->getListeClients();
       return $res;      
  }  
  function getListeTransporteursVerif(){
    $gestionMdl = new GestionUtilisateursModel();
    $res = $gestionMdl->getListeTransporteursVerif();
    return $res; 
   }
   function getListeTransporteursNonVerif(){
    $gestionMdl = new GestionUtilisateursModel();
       $res = $gestionMdl->getListeTransporteursNonVerif();
       return $res; 
   }

   function displayProfile($id){     
      $profilMdl = new ProfilUtilisateurModel();
      $res = $profilMdl->getUserInfo($id);
      $profilView = new GestionUtilisateursview();
      $profilView->displayProfilClient($res);

   }
   function validerTransporteur($id){
      $gestionMdl = new GestionUtilisateursModel();

       if ($gestionMdl->verifyCert($id)==TRUE) {
          $gestionMdl->validerTransporteurC($id);
       } else {
         $gestionMdl->validerTransporteurNC($id);
       }
       
     }
     function bannirUtilisateur($id){
      $gestionMdl = new GestionUtilisateursModel();
      $gestionMdl->bannirUtilisateur($id);
       
     }
     function changerStatutDemande($statut_demande,$id){
      
     }

}
  
?>