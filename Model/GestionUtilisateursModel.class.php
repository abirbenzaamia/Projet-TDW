<?php 
 require_once("Model/DataBaseModel.class.php");
 require_once("Model/SessionUtilisateur.class.php");
class GestionUtilisateursModel{
   
    function getListeClients ()
    {
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
               $sql= " SELECT * FROM ( SELECT utilisateurs.id as idt, `nom`, `prenom`, `email`, `tel`, `adr`, `mdp` FROM utilisateurs LEFT JOIN transporteursNC ON utilisateurs.id = transporteursNC.id WHERE transporteursNC.id is null) as u LEFT JOIN transporteursC ON u.idt = transporteursC.id WHERE transporteursC.id is null;";
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
function verifyCert($id){//verifier s'il s'agit d'un trasporteur certifié ou non 
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "SELECT * FROM `transporteursC` WHERE id = '".$id."'";
    $result = $db->query($sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        return TRUE  ;                   
      }else {
          return FALSE;
      }
  } 
 
   function bannirUtilisateur($id){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "INSERT INTO `utilisateurs_bannis` (`id`) VALUES ('".$id."')" ;
    $result = $db->query($sql); 
    return ($result);  
   }
   function validerTransporteurC($id){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "UPDATE `transporteursC` SET `statut` = '1' WHERE `transporteursC`.`id` = '".$id."'" ;
    $result = $db->query($sql); 
    return $result;   
   }
   function validerTransporteurNC($id){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "UPDATE `transporteursNC` SET `statut` = '1' WHERE `transporteursNC`.`id` = '".$id."'" ;
    $result = $db->query($sql); 
    return $result;   
   }
   function changerStatutDemande($statut_demande,$id){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "UPDATE `transporteursC` SET `statut_demande` = '".$statut_demande."' WHERE `transporteursC`.`id` = '".$id."'" ;
    $result = $db->query($sql); 
    return $result;   
   }

   function getListeTransporteursVerif(){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
           $sql= "SELECT * FROM utilisateurs RIGHT JOIN (SELECT `id` , `note`, `statut`, null as `statut_demande` FROM transporteursNC UNION ALL SELECT `id` , `note`, `statut`, `statut_demande` FROM transporteursC) as t ON utilisateurs.id = t.id WHERE statut <> 0; ";
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
   function getListeTransporteursNonVerif(){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
           $sql= "SELECT * FROM utilisateurs RIGHT JOIN (SELECT `id` , `note`, `statut`, null as `statut_demande` FROM transporteursNC UNION ALL SELECT `id` , `note`, `statut`, `statut_demande` FROM transporteursC) as t ON utilisateurs.id = t.id WHERE statut = 0;";
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