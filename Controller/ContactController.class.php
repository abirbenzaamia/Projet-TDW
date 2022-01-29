<?php
require_once("Model/ContactModel.class.php");
require_once("View/ContactView.class.php");


class ContactController{
    function displayContactInfo(){
        $ContactMdl = new ContactModel();
        $res = $ContactMdl->getContactInfo();
        $ContactView = new ContactView();
        $ContactView->displayContactInfo($res);

    }
    function diplayFormContact(){
        $ContactView = new ContactView();
        $ContactView->displayFormContact();
    }
}
?>