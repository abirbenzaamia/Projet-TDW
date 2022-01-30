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
    function displayAnnoncesNonValid(){
        $annonceMdl = new GestionAnnoncesModel();
        $res = $annonceMdl->getAnnoncesNonValid();
        $annoncView = new GestionAnnoncesView();
        $annoncView->diplayAnnoncesNonValid($res);
    }
    function validerAnnonce($id,$idDep,$idArv){
        $annonceMdl = new GestionAnnoncesModel();
        $tarif = $annonceMdl->getTarif($idDep,$idArv);
        $annonceMdl->validerAnnonce($id,$tarif);
        
    }

}
?>