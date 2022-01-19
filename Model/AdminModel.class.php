<?php 
 require_once("Model/DataBaseModel.class.php");
 require_once("Model/SessionUtilisateur.class.php");
class AdminModel{
   
    function AdminConn($nom,$mdp)
    {
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
               $sql= " SELECT * FROM `admins` WHERE nom = ".$nom." AND mdp = ".$mdp."";
               $result = $db->query($sql);    
               if (mysqli_num_rows($result) > 0) {
                // output data of each row
              return TRUE;
              }else {
                  return FALSE;
              }
           
}
}
?>