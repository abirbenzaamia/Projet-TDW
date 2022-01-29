<?php
require_once("Model/DataBaseModel.class.php");
class NewsModel{

    function getNews(){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "SELECT * FROM news";
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
    function getNewDetails($id){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "SELECT * FROM news where id = '".$id."'";
        $result = $db->query($sql);
        $results = array();
        if (mysqli_num_rows($result) > 0) {
    // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
    
            array_push($results, $row);
          }
        }
      return $results[0] ;
    }

}
?>