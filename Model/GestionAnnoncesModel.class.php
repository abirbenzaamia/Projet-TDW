<?php
require_once("Model/DataBaseModel.class.php");
require_once("Model/SessionUtilisateur.class.php");
class GestionAnnoncesModel{

 function getAnnoncesValid(){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "SELECT annonce_utilisateur.id, `id_utilisateur`, `wilaya_dep`, `wilaya_arv`, `type_transp`, `id_poids`, `moyen_transp`, `taille`, `date_ajout` , res.etat , res.tarif , res.idTC , res.idTNC FROM `annonce_utilisateur` LEFT JOIN (SELECT annonce_valide.`id`, annonce_valide.`tarif`, annonce_effect.`etat` , idTC , idTNC from annonce_valide LEFT JOIN annonce_effect on annonce_valide.id = annonce_effect.id) as res on res.id = annonce_utilisateur.id WHERE res.id is not null;";
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
 function getAnnoncesNonvalid(){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "SELECT annonce_utilisateur.`id`, `id_utilisateur`, `wilaya_dep`, `wilaya_arv`, `type_transp`, `id_poids`, `moyen_transp`, `taille`, `date_ajout` FROM annonce_utilisateur LEFT JOIN annonce_valide on annonce_utilisateur.id = annonce_valide.id where annonce_valide.id is null; ";
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

 function validerAnnonce($id,$tarif){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "INSERT INTO `annonce_valide`(`id`, `tarif`) VALUES ('".$id."','".$tarif."')";
    $result = $db->query($sql);
    echo $db->error;

 }
 function getTarif ($idDep , $idArv){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $results = array();
    $sql = "SELECT tarif FROM tarif_livraison WHERE idDep = '".$idDep."' AND idArv='".$idArv."'";
    $result = $db->query($sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {                   
          array_push($results, $row);                     
      }
  } 
return $results[0]['tarif'];

 }
 function getSignalements(){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "SELECT * FROM `signalements_transporteurs`";
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