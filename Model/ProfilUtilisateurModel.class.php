<?php

require_once("Model/DataBaseModel.class.php");
require_once("Model/SessionUtilisateur.class.php");
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
          return $results;
    }  
    function VerifyTransp($id){
          $dbModel= new DataBaseModel();
          $db = $dbModel->connectDB();
          $sql= " SELECT * FROM `transporteursNC` WHERE id=".$id."";
          $result = $db->query($sql);
          if (mysqli_num_rows($result) > 0) {
          return TRUE;
          }else{
              return FALSE;
          }

    }
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
    function getNomWilayasDep($tab){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $results = array();
        for ($i=0; $i < sizeof($tab); $i++) { 
            $sql= " SELECT * FROM `wilayas` WHERE idT=".$tab[$i]['idW']."";
            $result = $db->query($sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {                   
                  array_push($results, $row);                     
              }
          }  
        }
        return $result;
    }

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
     function getAnnonceValide($id){
         $dbModel= new DataBaseModel();
         $db = $dbModel->connectDB();
         $results = array();
         $sql= " SELECT * FROM annonce_valide LEFT JOIN annonce_utilisateur ON annonce_valide.id = annonce_utilisateur.id WHERE annonce_utilisateur.id_utilisateur=".$id." ";
         $result = $db->query($sql);
         if (mysqli_num_rows($result) > 0) {
             // output data of each row
             while($row = mysqli_fetch_assoc($result)) {                   
               array_push($results, $row);                     
           }
       } 
     }


}
?>