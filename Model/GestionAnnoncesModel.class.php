<?php
require_once("Model/DataBaseModel.class.php");
require_once("Model/SessionUtilisateur.class.php");
class GestionAnnoncesModel{



 function getAnnoncesValid(){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "SELECT annonce_utilisateur.`id`, `id_utilisateur`, annonce_valide.tarif, `type_transp`, `date_ajout` , null as `idTC`, null as `idTNC`, annonce_valide.etat FROM annonce_utilisateur LEFT JOIN annonce_valide on annonce_valide.id = annonce_utilisateur.id where annonce_valide.id is not null UNION SELECT annonce_utilisateur.`id`, `id_utilisateur`, null as tarif,`type_transp`, `date_ajout` , annonce_effect.`idTC`, annonce_effect.`idTNC`, annonce_effect.`etat` FROM annonce_utilisateur LEFT JOIN annonce_effect on annonce_effect.id = annonce_utilisateur.id where annonce_effect.id is not null;";
    $result = $db->query($sql);
    $results = array();
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {                   
          array_push($results, $row);                     
      }
  } 
  return $results;
 }
 function getAnnonceNonvalid(){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "SELECT * FROM annonce_utilisateur LEFT JOIN annonce_valide on annonce_utilisateur.id = annonce_valide.id where annonce_valide.id is null; ";
    $result = $db->query($sql);
    $results = array();
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