<?php
require_once("../Model/DataBaseModel.class.php");
 class AnnonceModel{
   

    function getAnnonceValide(){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $results = array();
        $sql= " SELECT * FROM annonce_valide limit 8";
        $result = $db->query($sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
              $query = " SELECT * FROM `annonce_utilisateur` WHERE id = '".$id."'";
              $res = $db->query($query);
              array_push($results, $res);
            }
          }
          echo $results;
          echo $db->error;
          return $results;
    }   

   
 

}
?>