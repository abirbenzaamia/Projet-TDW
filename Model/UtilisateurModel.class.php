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


}
?>