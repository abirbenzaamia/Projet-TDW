
<?php
$dir = dirname(__FILE__, 1);

require_once($dir."/Controller/PresentationController.class.php");
$PresentationCtrl = new PresentationController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <title>Présentation du site</title>
</head>
<body>
<div class="logo">
     <img src="assets/logo.svg" alt="logo">
    </div>
   
    <?php 

include("Routes/UtilisateurRoute.php");
 
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php
        include("Static/NavBar.php");
        ?>


    <?php
    $PresentationCtrl->displayPresentationDetails();
    ?>
        
</body>
<footer>
<div class="footer">
    <div class="desc">
        <img src="assets/logo_white.svg" alt="logo">
       
    </div>
   
    <ul class="menuItems">
        <li><a href='#' data-item='Accueil'>Accueil</a></li>
        <li><a href='#' data-item='Présentation'>Présentation</a></li>
        <li><a href='#' data-item='News'>News</a></li>
        <li><a href='#' data-item='Inscription'>Inscription</a></li>
        <li><a href='#' data-item='Statistiques'>Statistiques</a></li>
        <li><a href='#' data-item='Contact'>Contact</a></li>
      </ul>
      <br>
      <br>
      <br>
      <p> Ⓒ 2021 Cheetah Services . All rights reserved. </p>
</div>
</footer>
</html>