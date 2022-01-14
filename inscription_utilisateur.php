<?php
if (isset($_POST)) {
    inscrireUtilisateur();
}else{
    echo 'pas de données';
}

function inscrireUtilisateur(){
  session_start();
    include('dbConn.php');
    include('check_login.php');
    $errors = array(); 
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $adr = $_POST['adr'];
    $mdp = md5($_POST['mdp']); //chiffrer le mot de passe
       //verifier si l'utilisateur existe déja 
    $user_check_query = "SELECT * FROM `utilisateurs` WHERE email ='".$email."' OR tel ='".$tel."' limit 1 ;";
     $result1 = $db->query($user_check_query);
     $user = mysqli_fetch_assoc($result1);
     if ($result1) {
         
         if ($user) { // if user exists
             if ($user['tel'] === $tel) {
               array_push($errors, "Le numéro de téléphone est déjà utilisé ");
               echo 'Le numéro de téléphone est déjà utilisé';
             }
  
             if ($user['email'] === $email) {
               array_push($errors, "l'email est déjà utilisé");
               echo "l'adresse email est déjà utilisé";
             }
           }
     } 
     if (count($errors) == 0) {
  $sql = "INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `tel`, `adr`, `mdp`) VALUES ('".$nom."','".$prenom."','".$email."','".$tel."','".$adr."','".$mdp."')" ;// la requete sql de l'insertion
  $result = $db->query($sql);
  if ($result ===TRUE) {
    $sql2 = "SELECT `id` FROM `utilisateurs` WHERE email = '".$email."' AND tel = '".$tel."'"; //récupérer l'id qui est auto-incrémenté
    $result2 = $db->query($sql2);
    if (mysqli_num_rows($result2) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result2)) {
        $id = $row['id'];
      }
    }
    $_SESSION['id'] = $id;
      echo 'inscription avec succes';
  }else{
      echo 'inscription échouée';
  }
    }
}
?>