<?php
$dir = dirname(__FILE__, 2);
    require_once("View/ProfilUtilisateurView.class.php");
     $profilEleView = new ProfilUtilisateurView();
     $profilEleView->getProfilElement();
    
?>