<?php

use StatistiquesController as GlobalStatistiquesController;

require_once("Controller/StatistiquesController.class.php"); 

  class StatistiquesView{
    function getNbAnnonceValide()
    {
        $statCtrl = new GlobalStatistiquesController();
        $nb = $statCtrl->getNbAnnonceValide();
         echo '            <div class="forum-item">
         <div class="row">
             <div class="col-md-9">
                 <div class="forum-icon">
                     <i class="fa fa-shield"></i>
                 </div>
                 <h3 href="forum_post.html" class="forum-item-title">Nombre des annonces validées</h3>
                 <div class="forum-sub-title"></div>
             </div>
             <div class="col-md-1 forum-info">
         <span class="views-number">
             '.$nb.'
         </span>
         <div>
             <small>Annonces validées</small>
         </div>
     </div>
          
            
         </div>
     </div>';
    
    }
    function getNbUtilisateur()
    {
        $statCtrl = new GlobalStatistiquesController();
        $nb = $statCtrl->getNbUtilisateur();
         echo ' <div class="col-md-1 forum-info">
         <span class="views-number">
             '.$nb.'
         </span>
         <div>
             <small>Utilisateurs</small>
         </div>
     </div>';
    
    }
    function getNbTransporteur()
    {
        $statCtrl = new GlobalStatistiquesController();
        $nb = $statCtrl->getNbTransporteur();
         echo ' <div class="col-md-1 forum-info">
         <span class="views-number">
             '.$nb.'
         </span>
         <div>
             <small>Transporteurs</small>
         </div>
     </div>';
    
    }


}

?>