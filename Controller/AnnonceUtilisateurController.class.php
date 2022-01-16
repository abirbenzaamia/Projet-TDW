<?php
    
        require_once("../Model/AnnonceUtilisateurModel.class.php");
  class AnnonceUtilisateurController{
     function publierAnnonce($wilaya_dep,$wilaya_arv,$type_transp,$id_poids,$taille,$moyen_transp){      
         $AnnonceUtilisateur = new AnnonceUtilisateurModel();
         $AnnonceUtilisateur->publierAnnonce($wilaya_dep,$wilaya_arv,$type_transp,$id_poids,$taille,$moyen_transp);        
 }

}

?>