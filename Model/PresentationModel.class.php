<?php
require_once("Model/DataBaseModel.class.php");
class PresentationModel{
    function getPresentationDetails(){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql= " SELECT * FROM presentation ";
$result = $db->query($sql);
$results = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
      array_push($results, $row);
    }
  }
  return $results ;
        
    }
}

?>