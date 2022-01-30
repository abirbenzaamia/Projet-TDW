<?php
$dir = dirname(__FILE__, 2);
require_once($dir."/Model/DataBaseModel.class.php");
require_once($dir."/Model/SessionUtilisateur.class.php");
 class ProfilUtilisateurModel{
    function getUserInfo($id){  
          $dbModel= new DataBaseModel();
          $db = $dbModel->connectDB();
                 $results = array();
                 $sql= " SELECT * FROM `utilisateurs` WHERE id=".$id."";
                 $result = $db->query($sql);
                 if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_assoc($result)) {                   
                         array_push($results, $row);                     
                     }
                   }
          return $results[0];
    }  

    // function VerifyTransp($id){
    //       $dbModel= new DataBaseModel();
    //       $db = $dbModel->connectDB();
    //       $sql= " SELECT * FROM `transporteursNC` WHERE id=".$id."";
    //       $result = $db->query($sql);
    //       if (mysqli_num_rows($result) > 0) {
    //       return TRUE;
    //       }else{
    //           return FALSE;
    //       }
    // }
    function getIdWilayasDep($id){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql= " SELECT `idW` FROM `wilaya_dep` WHERE idT=".$id."";
        $result = $db->query($sql);
        $results = array();
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {                   
            array_push($results, $row);                     
        }
    }   
    return $result;     
    }
    function getIdWilayasArv($id){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql= " SELECT `idW` FROM `wilaya_arv` WHERE idT=".$id."";
        $result = $db->query($sql);
        $results = array();
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {                   
            array_push($results, $row);                     
        }
    }   
    return $result;     
    }
    // function getNomWilayasDep($tab){
    //     $dbModel= new DataBaseModel();
    //     $db = $dbModel->connectDB();
    //     $results = array();
    //     for ($i=0; $i < sizeof($tab); $i++) { 
    //         $sql= " SELECT * FROM `wilayas` WHERE idT=".$tab[$i]['idW']."";
    //         $result = $db->query($sql);
    //         if (mysqli_num_rows($result) > 0) {
    //             // output data of each row
    //             while($row = mysqli_fetch_assoc($result)) {                   
    //               array_push($results, $row);                     
    //           }
    //       }  
    //     }
    //     return $result;
    // }
//récupérer les annonces non validées publiées par un utilisateur donné
    function getAnnonceNonValide($id){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $results = array();
        $sql= " SELECT * FROM annonce_valide RIGHT JOIN annonce_utilisateur ON annonce_valide.id = annonce_utilisateur.id WHERE annonce_valide.id IS NULL AND annonce_utilisateur.id_utilisateur=".$id."";
        $result = $db->query($sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {                   
              array_push($results, $row);                     
          }
      } 
      return $results;
      //return $result;
    }
    //récupérer les annonces validées publiées par un utilisateur donné
     function getAnnonceValide($id){
         $dbModel= new DataBaseModel();
         $db = $dbModel->connectDB();
         $results = array();
         $sql= " SELECT * FROM annonce_utilisateur LEFT JOIN (SELECT annonce_valide.id , annonce_valide.tarif FROM annonce_valide LEFT JOIN annonce_effect on annonce_valide.id = annonce_effect.id WHERE annonce_effect.id is null ) as res on annonce_utilisateur.id = res.id where res.id is not null AND id_utilisateur= '".$id."' ";
         $result = $db->query($sql);
         if (mysqli_num_rows($result) > 0) {
             // output data of each row
             while($row = mysqli_fetch_assoc($result)) {                   
               array_push($results, $row);                     
           }
       } 
       return $results;
     }
     //récupérer les transactions publiées par un utilisateur donné
     function getTransactions($id){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $results = array();
        $sql= " SELECT * FROM annonce_utilisateur LEFT JOIN (SELECT annonce_valide.id , annonce_valide.tarif, `idTC`, `idTNC` FROM annonce_valide LEFT JOIN annonce_effect on annonce_valide.id = annonce_effect.id WHERE annonce_effect.id is not null ) as res on annonce_utilisateur.id = res.id where res.id is not null AND id_utilisateur = '".$id."'";
        $result = $db->query($sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {                   
              array_push($results, $row);                     
          }
      }
      return $results;
     }
     function getTransportEffectue($id){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $results = array();
        $sql= "";
        $result = $db->query($sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {                   
              array_push($results, $row);                     
          }
      }
      return $results;
     }

     function supprimerAnnonce($id){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "DELETE FROM `annonce_effect` WHERE id = '".$id."'";
        $result = $db->query($sql);
        $sql = "DELETE FROM `annonce_valide` WHERE id = '".$id."'";
        $result = $db->query($sql);
        $sql = "DELETE FROM `annonce_utilisateur` WHERE id = '".$id."'";
        $result = $db->query($sql);
     }
     function archiverAnnonce($id,$idUtilisateur,$idDep,$idArv,$type,$idPoids,$moyen,$date){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "INSERT INTO `annonces_archivees`(`id`, `id_utilisateur`, `wilaya_dep`, `wilaya_arv`, `type_transp`, `id_poids`, `moyen_transp`, `date_ajout`) VALUES ('".$id."','".$idUtilisateur."','".$idDep."','".$idArv."','".$type."','".$idPoids."','".$moyen."','".$date."')";
        $result = $db->query($sql);
        //echo $db->error;
     }
     function modifierAnnonce($id,$idDep,$idArv,$type,$idPoids,$moyen,$taille,$desc){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql="UPDATE `annonce_utilisateur` SET `wilaya_dep`='".$idDep."',`wilaya_arv`='".$idArv."',`type_transp`='".$type."',`id_poids`='".$idPoids."',`moyen_transp`='".$moyen."',`taille`='".$taille."',`description`='".$desc."' WHERE id='".$id."'";
    }
    function signalerTransporteurAnnonce($idA,$idT,$idU,$cause){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "INSERT INTO `signalements_transporteurs`(`id_utilisateur`, `id_transporteur`, `id_annonce`, `cause`) VALUES ('".$idU."','".$idT."','".$idA."','".$cause."')";
        $result = $db->query($sql);
    }
  
    function noterTransporteurAnnonce($id,$idT,$note){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
    }
    function getDemandePostule($idA){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "SELECT * FROM `demande_postuler` WHERE idA=".$idA."";
        $results = array();
        $result = $db->query($sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {                   
              array_push($results, $row);                     
          }
      }
      return $results;
     }

    }
    



?>