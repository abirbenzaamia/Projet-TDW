<?php
 require_once("../Controller/AnnonceUtilisateurController.class.php");
//routes pour publier une aanonce
    $wilaya_dep = $_POST['wilaya_dep'];
    $wilaya_arv = $_POST['wilaya_arv'];
    $type_transp = $_POST['type_transp'];
    $id_poids = $_POST['id_poids'];
    $taille = $_POST['taille'];
    $moyen_transp = $_POST['moyen_transp'];
    $func = $_POST['pub'];
    //remember to escape it
if ($func==='pub') {
    $annonceCtrl = new AnnonceUtilisateurController();
    $annonceCtrl->publierAnnonce($wilaya_dep,$wilaya_arv,$type_transp,$id_poids,$taille,$moyen_transp);

}

?>