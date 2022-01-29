<?php
 class DataBaseModel{
    public $db ;
    function connectDB(){
        
    //connecter à la base de données
    try {
        $servername = "localhost";
        $dbname = "test";
        $username = "root";
        $password = ""; 
        $db = mysqli_connect($servername, $username, $password, $dbname);           
    }
    catch(PDOException $e) {
       echo "<script language='javascript'>";
       echo "alert('Connexion échouée'". $db->connect_error .")";
       echo "</script>";
       
    }
    return $db;
    }

   
 

}
?>