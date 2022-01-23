<?php
require_once("Model/GestionAnnoncesModel.class.php");
require_once("View/GestionAnnoncesView.class.php");
class GestionAnnoncesController{
    function displayAnnoncesValid(){
        $annonceMdl = new GestionAnnoncesModel();
        $res = $annonceMdl->getAnnoncesValid();
        $annoncView = new GestionAnnoncesView();
        $annoncView->diplayAnnoncesValid($res);
    }
}
?>