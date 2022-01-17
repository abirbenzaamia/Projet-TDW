<?php
 require_once("../Controller/AnnonceController.class.php");
    $annonceCtrl = new AnnonceController();
    $results= $annonceCtrl->getAnnonceValide();
    echo $results;
?>