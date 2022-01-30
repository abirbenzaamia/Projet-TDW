<?php
  session_start();  
        require_once("Model/ProfilUtilisateurModel.class.php");
        require_once("View/ProfilUtilisateurView.class.php");   
        require_once("Model/AnnonceModel.class.php");

 class ProfilUtilisateurController{
    function displayUserInfo(){  
      $id = $_SESSION['id'];
      $profilMdl = new ProfilUtilisateurModel();
      $res = $profilMdl->getUserInfo($id);
      $profilView = new ProfilutilisateurView();
      $profilView->displayUserInfo($res);
       
  }  
  // function VerifyTransp(){
  //   $id = $_SESSION['id'];
  //   $profilMdl = new ProfilUtilisateurModel();
  //   $res = $profilMdl->VerifyTransp($id);
  //   return $res;

  // }
  function getIdWilayasDep(){
    $id = $_SESSION['id'];
    $profilMdl = new ProfilUtilisateurModel();
    $res = $profilMdl->getIdWilayasDep($id);
    return $res;     
  }
  // function getNomWilayasDep(){
  //   $id = $_SESSION['id'];
  //   $profilMdl = new ProfilUtilisateurModel();
  //   $res1 = $profilMdl->getIdWilayasDep($id);
  //    $res = $profilMdl->getNomWilayasDep($res1);
  //      return $res;
  // }
  function displayAnnonceNonValide(){
    $id = $_SESSION['id'];
    $profilMdl = new ProfilUtilisateurModel();
    $res = $profilMdl->getAnnonceNonValide($id);
    $profilView = new ProfilutilisateurView();
    $profilView->displayAnnonceNonValide($res);
  }
  function displayAnnonceValide(){
    $id = $_SESSION['id'];
    $profilMdl = new ProfilUtilisateurModel();
    $res = $profilMdl->getAnnonceValide($id);
    $profilView = new ProfilutilisateurView();
    $profilView->displayAnnonceValide($res);
  }
  function displayTransaction(){
    $id = $_SESSION['id'];
    $profilMdl = new ProfilUtilisateurModel();
    $res = $profilMdl->getTransactions($id);
    $profilView = new ProfilutilisateurView();
    $profilView->displayTransaction($res);
  }
  function SupprimerAnnonce($id){
    $profilMdl = new ProfilUtilisateurModel();
    $AnnonceMdl = new AnnonceModel();
    $res = $AnnonceMdl->getAnnonceDetails($id);
    $idUtilisateur = $res['id_utilisateur'];
    $idDep = $res['wilaya_dep'];
    $idArv = $res['wilaya_arv'];
    $type =  $res['type_transp'];
    $idPoids = $res['id_poids'];
    $moyen = $res['moyen_transp'];
    $date = $res['date_ajout'];
    $profilMdl->supprimerAnnonce($id);
    $profilMdl->archiverAnnonce($id,$idUtilisateur, $idDep, $idArv, $type, $idPoids, $moyen, $date);
    
  }
  function displayFormModif(){
    $profilView = new ProfilutilisateurView();
    $AnnonceMdl = new AnnonceModel();
    $id = $_GET['modif'];
    $res = $AnnonceMdl->getAnnonceDetails($id);
    $profilView->displayFormModif($res);
  }
  function ModifierAnnonce($id,$idUtilisateur, $idDep, $idArv, $type, $idPoids, $moyen, $taille,$desc){
    $profilMdl = new ProfilUtilisateurModel();
    $AnnonceMdl = new AnnonceModel();
    $profilMdl->modifierAnnonce($id,$idUtilisateur, $idDep, $idArv, $type, $idPoids, $moyen, $taille,$desc);
  }
  function displayFormSignal($idA, $idT, $idU){
    $profilView = new ProfilutilisateurView();
    $profilView->displayFormSignal($idA, $idT, $idU);
     
  }
  function signalerTransporteurAnnonce($idA, $idT, $idU, $cause){
    $profilMdl = new ProfilUtilisateurModel();
    $profilMdl->signalerTransporteurAnnonce($idA, $idT, $idU, $cause);

  }
  function displayDemandePostule($idA){
    $profilMdl = new ProfilUtilisateurModel();
    $res = $profilMdl->getDemandePostule($idA);
    $profilView = new ProfilutilisateurView();
    return ($profilView->displayDemandePostule($res));
    

  }



}

?>