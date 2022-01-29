<?php
 require_once("Model/DataBaseModel.class.php");
 
 class WilayasModel{

     function displayWilayas(){
     
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "SELECT * from wilayas";
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
     function getNomWilaya($id){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "SELECT nom from wilayas where id ='".$id."'";
        $result = $db->query($sql);  
        $results = array();
        if (mysqli_num_rows($result) > 0) {
         // output data of each row
         while($row = mysqli_fetch_assoc($result)) {                   
             array_push($results, $row);                   
         }
       }
    return $results[0]['nom'];  
     }
 }

?>