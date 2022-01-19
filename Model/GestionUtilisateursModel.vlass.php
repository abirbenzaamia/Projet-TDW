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
   function bunnirClients(){

   }
   function getListeTransporteursValide(){
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

}
?>