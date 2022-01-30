<?php
session_start(); 
$dir = dirname(__FILE__, 2);

require_once($dir."/Model/DataBaseModel.class.php");
 class AnnonceModel{
   
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
       function displayTypeTransp (){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "SELECT * from type_transport";
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
       function displayPoids(){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "SELECT * FROM `poids`";
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
       function publierAnnonce($wilaya_dep,$wilaya_arv,$type_transp,$id_poids,$taille,$moyen_transp,$desc){

        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $id = $_SESSION['id'];
        $sql= " INSERT INTO `annonce_utilisateur` (`id_utilisateur`, `wilaya_dep`, `wilaya_arv`, `type_transp`, `id_poids`, `moyen_transp`, `taille`,`description`) VALUES ('".$id."','".$wilaya_dep."','".$wilaya_arv."','".$type_transp."','".$id_poids."','".$moyen_transp."','".$taille."','".$desc."') ";
        $result = $db->query($sql);
        if ($result){
            echo "success";
           
        }else{
            echo $db->error;
            
        }    
          
    }
    function rechAnnonceDepArv($idDep,$idArv){
      $dbModel= new DataBaseModel();
      $db = $dbModel->connectDB();
      $sql = " SELECT * FROM annonce_utilisateur LEFT JOIN (SELECT annonce_valide.id , tarif FROM annonce_valide LEFT JOIN annonce_effect on annonce_valide.id = annonce_effect.id WHERE annonce_effect.id is null ) as res on annonce_utilisateur.id = res.id where res.id is not null and wilaya_dep = '".$idDep."' and wilaya_arv = '".$idArv."'";
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
    function displayAnnoncesValides(){
      $dbModel= new DataBaseModel();
      $db = $dbModel->connectDB();
      $sql = "SELECT annonce_utilisateur.id , type_transp , description FROM annonce_utilisateur LEFT JOIN (SELECT annonce_valide.id FROM annonce_valide LEFT JOIN annonce_effect on annonce_valide.id = annonce_effect.id WHERE annonce_effect.id is null ) as res on annonce_utilisateur.id = res.id where res.id is not null limit 8;";
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
   function getPoidsDetails($id){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "SELECT * from poids where id ='".$id."'";
    $result = $db->query($sql);  
    $results = array();
    if (mysqli_num_rows($result) > 0) {
     // output data of each row
     while($row = mysqli_fetch_assoc($result)) {                   
         array_push($results, $row);                   
     }
   }

return $results[0]; 
   }
   function getAnnonceDetails($id){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "SELECT * FROM annonce_utilisateur LEFT JOIN (SELECT annonce_valide.id , annonce_valide.tarif FROM annonce_valide LEFT JOIN annonce_effect on annonce_valide.id = annonce_effect.id WHERE annonce_effect.id is null ) as res on annonce_utilisateur.id = res.id where res.id is not null and annonce_utilisateur.id = '".$id."';";
    $result = $db->query($sql);
    $results = array();
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {                   
          array_push($results, $row);                     
      }
  } 

  return $results[0];
   }
   
   function getSuggestionsTransporteurs($idDep,$idArv){
    $dbModel= new DataBaseModel();
    $db = $dbModel->connectDB();
    $sql = "SELECT wilaya_dep.idT , wilaya_dep.idW as dep , wilaya_arv.idW as arv FROM `wilaya_dep` inner join wilaya_arv on wilaya_dep.idT WHERE wilaya_dep.idW =".$idDep." AND wilaya_arv.idW =".$idArv." GROUP BY wilaya_dep.idT;";
    $result = $db->query($sql);
    echo $db->error;
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