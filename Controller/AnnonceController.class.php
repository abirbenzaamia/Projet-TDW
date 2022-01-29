<?php
session_start();
$dir = dirname(__FILE__, 2);

    //defined('BASEPATH') OR exit('No direct script access allowed');
  require_once($dir."/Model/AnnonceModel.class.php");
  require_once($dir."/View/AnnonceView.class.php");
 
  class AnnonceController{

    function getAnnonceValide(){
       $annonceMdl = new AnnonceModel();
       $res = $annonceMdl->getAnnonceValide();
       return $res;
    }
    function displayWilayas(){
      $AnnonceMdl = new AnnonceModel();
      $res = $AnnonceMdl->displayWilayas();
      $AnnonceView = new AnnonceView();
      $AnnonceView->displayWilayas($res);
     }  
     function displayTypeTransp(){
      $AnnonceMdl = new AnnonceModel();
      $res = $AnnonceMdl->displayTypeTransp();
      $AnnonceView = new AnnonceView();
      $AnnonceView->displayTypeTransp($res);
     }  
     function displayPoids(){
      $AnnonceMdl = new AnnonceModel();
      $res = $AnnonceMdl->displayPoids();
      $AnnonceView = new AnnonceView();
      $AnnonceView->displayPoids($res);
     }
     function publierAnnonce($wilaya_dep,$wilaya_arv,$type_transp,$id_poids,$taille,$moyen_transp,$desc){      
      $AnnonceMdl = new AnnonceModel();
      $AnnonceMdl->publierAnnonce($wilaya_dep,$wilaya_arv,$type_transp,$id_poids,$taille,$moyen_transp,$desc);        
}
function displayFormAjoutAnnonce(){
  $AnnonceView = new AnnonceView();
  if (isset($_SESSION['id'])) {
    $AnnonceView->displayFormAjoutAnnonce();
  }else 
  {
    echo'';
  }
 
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



 }




?>