<?php

require_once("AnnonceController.class.php");


 //routes pour publier une annonce
       $wilaya_dep = $_POST['wilaya_dep'];
       $wilaya_arv = $_POST['wilaya_arv'];
       $type_transp = $_POST['type_transp'];
       $id_poids = $_POST['id_poids'];
       $taille = $_POST['taille'];
       $moyen_transp = $_POST['moyen_transp'];
       $desc = $_POST['desc'];
       $func = $_POST['pub'];
       //remember to escape it
   if ($func==='pub') {
       $annonceCtrl = new AnnonceController();
       $annonceCtrl->publierAnnonce($wilaya_dep,$wilaya_arv,$type_transp,$id_poids,$taille,$moyen_transp,$desc);
   }





?>