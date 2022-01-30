<?php
$dir = dirname(__FILE__, 1);

require_once($dir."/Controller/AnnonceController.class.php");
require_once($dir."/Controller/AccueilController.class.php");

$AnnonceCtrl = new AnnonceController();
$AccueilCtrl = new AccueilController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>   
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil</title>
</head>
<body>
  
    <div class="logo">
     <img src="assets/logo.svg" alt="logo">
    </div>
   
    <?php 
include("Config/UtilisateurRoute.php");
    ?>
  
    <div class="diaporama">
      <div class="container">
          <a href="#">
              <img src="assets/img1.jpg" alt="news" class="diapoImg">
          </a>
          <a href="#">
            <img src="assets/img2.jpg" alt="news" class="diapoImg">
        </a>
        <a href="#">
            <img src="assets/img3.jpg" alt="news" class="diapoImg">
        </a>
        <a href="#">
            <img src="assets/img4.jpg" alt="news" class="diapoImg">
        </a>
        <a href="#">
            <img src="assets/img5.jpg" alt="news" class="diapoImg">
        </a>
        <a href="#">
            <img src="assets/img6.jpg" alt="news" class="diapoImg">
        </a>
      </div>
    </div>
        <?php
        include("Static/NavBar.php");
          $AccueilCtrl->displaySectionRechAnnonces();
          $AnnonceCtrl->displayAnnoncesValides();
          ?>
        
    <div class="comment">
       <a href="#">Comment cela fonctionne</a>
    </div>
    
    <!-- formulaire pour ajouter une annonce -->
    <?php
    $AccueilCtrl->displayFormAjoutAnnonce();
    ?>
    <!-- formulaire de connexion -->
    <?php
    require_once("Static/FormConn.php");
    ?>
     <script src="js/script.js"></script>  
</body>
<?php
include("Static/Footer.php");
?>
</html>

