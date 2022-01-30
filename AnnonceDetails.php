<?php
$dir = dirname(__FILE__, 1);
session_start();
require_once($dir."/Controller/AnnonceController.class.php");
require_once($dir."/Controller/UtilisateurController.class.php");
$AnnonceCtrl = new AnnonceController();
if (isset($_GET['id_annonce'])) {
    $id = $_GET['id_annonce'];
 }
 if (isset($_GET['idA'])) {
    $idA = $_GET['idA'];
    $idT = $_SESSION['id'];
    $utilisateurCtrl = new UtilisateurController();
    $utilisateurCtrl->PostulerAnnonce($idT,$idA);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Details de l'Annonce</title>
</head>
<body>
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    <div class="logo">
     <img src="assets/logo.svg" alt="logo">
    </div>
    <?php 

include("Config/UtilisateurRoute.php");
 
    ?>
    <?php
        include("Static/NavBar.php");
        ?>

    
            <div class="col-lg-10">
                <div class="section-title">
                    <h2>Details de l'Annonce</h2>
                    <p></p>
                </div>
            </div>
            <div class="details" >
                <?php
                $AnnonceCtrl->displayAnnonceDetails($id);
                ?>
            </div>
        

       
    </div>
</body>
<footer>

   
    <?php
include("Static/Footer.php");
?>
 
</footer>
</html>