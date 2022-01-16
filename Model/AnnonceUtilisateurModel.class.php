<?php
session_start(); 
require_once("../Model/DataBaseModel.class.php");

 class AnnonceUtilisateurModel{
    
    function publierAnnonce($wilaya_dep,$wilaya_arv,$type_transp,$id_poids,$taille,$moyen_transp){

        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $id = $_SESSION['id'];
        $sql= " INSERT INTO `annonce_utilisateur` (`id_utilisateur`, `wilaya_dep`, `wilaya_arv`, `type_transp`, `id_poids`, `moyen_transp`, `taille`, `verif`) VALUES ('".$id."','".$wilaya_dep."','".$wilaya_arv."','".$type_transp."','".$id_poids."','".$moyen_transp."','".$taille."','0') ";
        $result = $db->query($sql);
        if ($result){
            echo "success";
           
        }else{
            echo $db->error;
            
        }    
          
    }

}
?>