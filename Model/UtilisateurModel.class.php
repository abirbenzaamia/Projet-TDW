<?php 
$dir = dirname(__FILE__, 2);
session_start();

 require_once($dir."/Model/DataBaseModel.class.php");
class UtilisateurModel{
     function seConnecter($email,$mdp){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $query = "SELECT * FROM `utilisateurs` WHERE email = '$email' ";
        $result = mysqli_query($db, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['mdp'] === $mdp)
                {
                 $_SESSION['id'] = $user_data['id'];
                    echo "success";
                }else{
                    echo "vérifier votre mot de passe";
                }
            }
        }else {
            echo "l'adresse email n'existe pas veuillez s'incrire";
        }
     }
     function verifyTransporteur($id){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql= " SELECT transporteursNC.id FROM transporteursNC WHERE id = '".$id."' UNION SELECT transporteursC.id FROM transporteursC WHERE id = ".$id.";";
        $result = $db->query($sql);
        if (mysqli_num_rows($result) > 0) {
        return TRUE;
        }else{
            return FALSE;
        }
     }
     function verifyExisteUtilisateur($email,$tel){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $user_check_query = "SELECT * FROM `utilisateurs` WHERE email ='".$email."' OR tel ='".$tel."' limit 1 ;";
        $result = $db->query($user_check_query);
        if (mysqli_num_rows($result) > 0) {
            return TRUE;
            }else{
                return FALSE;
            }
     }
     function registerClient($nom,$prenom,$email,$tel,$adr,$mdp){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `tel`, `adr`, `mdp`) VALUES ('".$nom."','".$prenom."','".$email."','".$tel."','".$adr."','".$mdp."')" ;// la requete sql de l'insertion
        $result = $db->query($sql);
        if ($result) {
            $last_id = $db->insert_id;
        return $last_id;
        }
        

     }
     function registerTransporteurNC($id){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "INSERT INTO `transporteursNC` (`id`) VALUES ('".$id."')" ;// la requete sql de l'insertion
        $result = $db->query($sql);   
     }
     function registerTransporteurC($id){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        $sql = "INSERT INTO `transporteursC` (`id`) VALUES ('".$id."')" ;// la requete sql de l'insertion
        $result = $db->query($sql); 
     }
     function setWilayasDepTransporteut($id,$wilayas_dep){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        for ($i=0; $i < sizeof($wilayas_dep); $i++) { 
            $sql = "INSERT INTO `wilaya_dep` (`idT`,`idW`) VALUES ('".$id."','".$wilayas_dep[$i]."')";
            $result = $db->query($sql);
        }
     }
     function setWilayasArvTransporteut($id,$wilayas_arv){
        $dbModel= new DataBaseModel();
        $db = $dbModel->connectDB();
        for ($i=0; $i < sizeof($wilayas_arv); $i++) { 
            $sql = "INSERT INTO `wilaya_arv` (`idT`,`idW`) VALUES ('".$id."','".$wilayas_arv[$i]."')";
            $result = $db->query($sql);
         
          }
    }

}
?>