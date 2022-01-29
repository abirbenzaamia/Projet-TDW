<?php
session_start();
$dir = dirname(__FILE__, 2);

    //defined('BASEPATH') OR exit('No direct script access allowed');
  require_once($dir."/Model/AnnonceModel.class.php");

  require_once($dir."/View/AnnonceView.class.php");

  require_once($dir."/Model/UtilisateurModel.class.php");

 

  class AnnonceController{

    function displayWilayas(){
      $AnnonceMdl = new AnnonceModel();
      $res = $AnnonceMdl->displayWilayas();
      $AnnonceView = new AnnonceView();
      $wilayas = $AnnonceView->displayWilayas($res);
      return $wilayas;
     }  
     function displayTypeTransp(){
      $AnnonceMdl = new AnnonceModel();
      $res = $AnnonceMdl->displayTypeTransp();
      $AnnonceView = new AnnonceView();
      $types = $AnnonceView->displayTypeTransp($res);
      return $types;
     }  
     function displayPoids(){
      $AnnonceMdl = new AnnonceModel();
      $res = $AnnonceMdl->displayPoids();
      $AnnonceView = new AnnonceView();
      $poids = $AnnonceView->displayPoids($res);
      return $poids;
     }
     function publierAnnonce($wilaya_dep,$wilaya_arv,$type_transp,$id_poids,$taille,$moyen_transp,$desc){      
      $AnnonceMdl = new AnnonceModel();
      $AnnonceMdl->publierAnnonce($wilaya_dep,$wilaya_arv,$type_transp,$id_poids,$taille,$moyen_transp,$desc);        
}

function displayAnnoncesValides(){
  $AnnonceMdl = new AnnonceModel();
  $res = $AnnonceMdl->displayAnnoncesValides();
  $AnnonceView = new AnnonceView();
  $AnnonceView->displayAnnoncesValides($res);
}
function displayResRech($idDep,$idArv){
  $AnnonceMdl = new AnnonceModel();
  $res = $AnnonceMdl->rechAnnonceDepArv($idDep,$idArv);
  $AnnonceView = new AnnonceView();
  $AnnonceView->displayResRech($res);
}
function displayNomWilaya($id){
  $AnnonceMdl = new AnnonceModel();
  $res = $AnnonceMdl->getNomWilaya($id);
  return $res;
}
function displayPoidsDetails($id){
  $AnnonceMdl = new AnnonceModel();
  $res = $AnnonceMdl->getPoidsDetails($id);
  return $res;
}
function displayAnnonceDetails($id){
  $AnnonceMdl = new AnnonceModel();
  $res = $AnnonceMdl->getAnnonceDetails($id);
  $AnnonceView = new AnnonceView();
  $UtilisateurMdl = new UtilisateurModel();
  if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
     if ($UtilisateurMdl->verifyTransporteur($id)) {
      $AnnonceView->displayAnnonceDetailsConnTransporteur($res);
     } else {
      $AnnonceView->displayAnnonceDetailsConnClient($res);
     }
     
   
  }else 
  {
    $AnnonceView->displayAnnonceDetailsNonConn($res);
  }
 
}




 }




?>