<?php
require_once("Model/PresentationModel.class.php");
require_once("View/PresentationView.class.php");


class PresentationController{
    function displayPresentationDetails(){
        $PresentationMdl = new PresentationModel();
        $res = $PresentationMdl->getPresentationDetails();
        $PresentationView = new PresentationView();
        $PresentationView->displayPrentationDetails($res);
    }
}
?>