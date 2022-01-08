<?php


if (isset($_POST['inscription_btn'])) {
    inscrireUtilisateur();
}else{
    echo 'pas de données';
}

function inscrireUtilisateur(){
    include('dbConn.php');
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $adr = $_POST['adr'];
    $mdp = sha1($_POST['mdp']); //chiffrer le mot de passe

 
     $sql = "INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `tel`, `adr`, `mdp`) VALUES ('".$nom."','".$prenom."','".$email."','".$tel."','".$adr."','".$mdp."')" ;// la requete sql de l'insertion
     $result = $db->query($sql);
     if ($result ===TRUE) {
         echo 'inscription avec succes';
     }else{
         echo 'inscription échouée';
     }
}
?>