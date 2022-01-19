<?php
   require_once("Model/StatistiquesModel.class.php"); 

  class StatistiquesController{
    function getNbAnnonceValide()
    {
        $statMdl = new StatistiquesModel();
        $nb = $statMdl->getNbAnnonceValide();
         return $nb;
    
    }
    function getNbUtilisateur()
    {
        $statMdl = new StatistiquesModel();
        $nb = $statMdl->getNbUtilisateur();
         return $nb;
    
    }
    function getNbTransporteur()
    {
        $statMdl = new StatistiquesModel();
        $nb = $statMdl->getNbtransporteur();
         return $nb;
    
    }

}

?>