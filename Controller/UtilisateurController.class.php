<?php
session_start();
$dir = dirname(__FILE__, 2);
require_once($dir."/Model/UtilisateurModel.class.php");
class UtilisateurController{
    function registerClient($nom,$prenom,$email,$tel,$adr,$mdp){
        $UtilisateurMdl = new UtilisateurModel();
        $bool = $UtilisateurMdl->verifyExisteUtilisateur($email,$tel);
        if ($bool) {
            echo 'Cet utilisateur existe déjà';
        }else{
            $id = $UtilisateurMdl->registerClient($nom,$prenom,$email,$tel,$adr,$mdp);
            $_SESSION['id'] = $id;
            echo 'success';
        }
    }
    function registerTransporteurNC($nom,$prenom,$email,$tel,$adr,$mdp,$wilayas_dep,$wilayas_arv){
        $UtilisateurMdl = new UtilisateurModel();
        $bool = $UtilisateurMdl->verifyExisteUtilisateur($email,$tel);
        if ($bool) {
            echo 'Cet utilisateur existe déjà';
        }else{
            $id = $UtilisateurMdl->registerClient($nom,$prenom,$email,$tel,$adr,$mdp);
            $UtilisateurMdl->registerTransporteurNC($id);
            $UtilisateurMdl->setWilayasDepTransporteut($id,$wilayas_dep);
            $UtilisateurMdl->setWilayasArvTransporteut($id,$wilayas_arv);
            $_SESSION['id'] = $id;
            echo 'success';
        }
    }
    function registerTransporteurC($nom,$prenom,$email,$tel,$adr,$mdp,$wilayas_dep,$wilayas_arv){
        $UtilisateurMdl = new UtilisateurModel();
        $bool = $UtilisateurMdl->verifyExisteUtilisateur($email,$tel);
        if ($bool) {
            echo 'Cet utilisateur existe déjà';
        }else{
            $id = $UtilisateurMdl->registerClient($nom,$prenom,$email,$tel,$adr,$mdp);
            $UtilisateurMdl->registerTransporteurC($id);
            $UtilisateurMdl->setWilayasDepTransporteut($id,$wilayas_dep);
            $UtilisateurMdl->setWilayasArvTransporteut($id,$wilayas_arv);
            $_SESSION['id'] = $id;
            echo 'success';
        }
    }
    function getNomPrenomUtilisateur($id){
        $UtilisateurMdl = new UtilisateurModel();
        $res = $UtilisateurMdl->getNomPrenomUtilisateur($id);
        return $res;
    }
}
?>