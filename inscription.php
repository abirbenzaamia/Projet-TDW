
<?php
$dir = dirname(__FILE__, 1);
require_once($dir."/Controller/AccueilController.class.php");
$AccueilCtrl = new AccueilController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/inscriptionStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
    <link rel="stylesheet" href="css/filter_multi_select.css" />
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Inscription</title>
</head>
<body>

<div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"  crossorigin="anonymous"></script>
<div class="logo">
     <img src="assets/logo.svg" alt="logo">
    </div>
   
    <?php 
include("Config/UtilisateurRoute.php");
include("Static/NavBar.php");
$AccueilCtrl->displayFormInscription();
    ?>
          
          <script src="js/scriptInscription.js"></script>
          <script src="js/filter-multi-select-bundle.min.js"></script>
          <div>
  </div>
</body>
<footer>
<?php
include("Static/Footer.php");
?>
</footer>
</html>