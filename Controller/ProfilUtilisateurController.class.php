<?php
  session_start();  
        require_once("Model/ProfilUtilisateurModel.class.php");
        require_once("Model/SessionUtilisateur.class.php");       
 class ProfilUtilisateurController{
    function getUserInfo(){  
       $id = $_SESSION['id'];
       $profilMdl = new ProfilUtilisateurModel();
       $res = $profilMdl->getUserInfo($id);
       return $res;
       
  }  
  function VerifyTransp(){
    $id = $_SESSION['id'];
    $profilMdl = new ProfilUtilisateurModel();
    $res = $profilMdl->VerifyTransp($id);
    return $res;

  }
  function getIdWilayasDep(){
    $id = $_SESSION['id'];
    $profilMdl = new ProfilUtilisateurModel();
    $res = $profilMdl->getIdWilayasDep($id);
    return $res;     
  }
  function getNomWilayasDep(){
    $id = $_SESSION['id'];
    $profilMdl = new ProfilUtilisateurModel();
    $res1 = $profilMdl->getIdWilayasDep($id);
     $res = $profilMdl->getNomWilayasDep($res1);
       return $res;
  }
  function getAnnonceNonValide(){
    $id = $_SESSION['id'];
    $profilMdl = new ProfilUtilisateurModel();
    $res = $profilMdl->getAnnonceNonValide($id);
    return $res;
  }
  function getAnnonceValide(){
    $id = $_SESSION['id'];
    $profilMdl = new ProfilUtilisateurModel();
    $res = $profilMdl->getAnnonceValide($id);
    return $res;
  }



}

?>