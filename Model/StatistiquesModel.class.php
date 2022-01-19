<?php 
 require_once("Model/DataBaseModel.class.php");
 require_once("Model/SessionUtilisateur.class.php");
class StatistiquesModel{
   
    function getNbAnnonceValide()
    {
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $results = array();
               $sql= " SELECT COUNT(*) as nb FROM annonce_valide";
               $result = $db->query($sql);    
               if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {                   
                    array_push($results, $row);                     
                }
              }
     return $results[0]['nb'];        
    
    }
    function getNbUtilisateur()
    {
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $results = array();
               $sql= " SELECT COUNT(*) as nb FROM utilisateurs";
               $result = $db->query($sql);    
               if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {                   
                    array_push($results, $row);                     
                }
              }
     return $results[0]['nb'];        
    
    }
    function getNbtransporteur()
    {
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $results = array();
               $sql= " SELECT COUNT(*) as nb FROM transporteursNC ";
               $result = $db->query($sql);    
               if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {                   
                    array_push($results, $row);                     
                }
              }
     return $results[0]['nb'];        
    
    }

}

?>