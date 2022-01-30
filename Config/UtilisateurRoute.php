<?php
$dir = dirname(__FILE__, 2);
    require_once($dir."/View/ProfilUtilisateurView.class.php");
     $profilEleView = new ProfilUtilisateurView();
     $profilEleView->getProfilElement();
    
?>