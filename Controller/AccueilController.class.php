<?php
session_start();

require_once("View/AccueilView.class.php");
class AccueilController{
    function displaySectionRechAnnonces(){
        $AccueilView = new AccueilView();
        $AccueilView->displaySectionRechAnnonces();
      }
      function displayFormAjoutAnnonce(){
        $AccueilView = new AccueilView();
        
        if (isset($_SESSION['id'])) {
            $AccueilView->displayFormAjoutAnnonce();
        }else 
        {
          echo'';
        }
       
      }
      function displayFormInscription()
      {
        $AccueilView = new AccueilView();
        $AccueilView->displayFormInscription();
      }
}
?>