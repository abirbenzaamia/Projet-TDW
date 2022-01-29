<?php

$dir = dirname(__FILE__, 2);
require_once($dir."/Controller/AnnonceController.class.php");
require_once($dir."/Controller/UtilisateurController.class.php");


//$annonceCtrl = new AnnonceUtilisateurController();

 //routes pour publier une aanonce
 $func = $_POST['pub'];
   if ($func==='pub') {
    $wilaya_dep = $_POST['wilaya_dep'];
    $wilaya_arv = $_POST['wilaya_arv'];
    $type_transp = $_POST['type_transp'];
    $id_poids = $_POST['id_poids'];
    $taille = $_POST['taille'];
    $moyen_transp = $_POST['moyen_transp'];
    $desc = $_POST['desc'];
        $annonceCtrl = new AnnonceController();
        $annonceCtrl->publierAnnonce($wilaya_dep,$wilaya_arv,$type_transp,$id_poids,$taille,$moyen_transp,$desc);
   }
 //routes pour s'inscrire
$user = $_POST['user'];
$UtilisateurCtrl = new UtilisateurController();
$nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $adr = $_POST['adr'];
    $mdp = md5($_POST['mdp']);
switch ($user) {
    case 'client':
        $UtilisateurCtrl->registerClient($nom,$prenom,$email,$tel,$adr,$mdp);
        break;
    case 'trasporteurNC':
        $wilayas_dep = $_POST['wilayas_dep'];
        $wilayas_arv = $_POST['wilayas_arv'];
        $UtilisateurCtrl->registerTransporteurNC($nom,$prenom,$email,$tel,$adr,$mdp,$wilayas_dep,$wilayas_arv);
        break;
    case 'trasporteurC':
        $wilayas_dep = $_POST['wilayas_dep'];
        $wilayas_arv = $_POST['wilayas_arv'];
        $UtilisateurCtrl->registerTransporteurC($nom,$prenom,$email,$tel,$adr,$mdp,$wilayas_dep,$wilayas_arv);
        break;
    default:
        break;
}






?>