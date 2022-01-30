<?php
$dir = dirname(__FILE__, 1);
require_once($dir."/Controller/ProfilUtilisateurController.class.php");
$profilCtrl = new ProfilUtilisateurController();
if (isset($_GET['idA']) && isset($_GET['idU']) && isset($_GET['idT'])) {
    $idA = $_GET['idA'];
    $idU = $_GET['idU'];
    $idT = $_GET['idT'];
 }
 if (isset($_POST['signal'])) {
    $idA = $_POST['idA'];
    $idU = $_POST['idU'];
    $idT = $_POST['idT'];
    $cause = $_POST['cause'];
    $profilCtrl = new ProfilUtilisateurController();
    $profilCtrl->signalerTransporteurAnnonce($idA, $idT, $idU, $cause);
     header("Location:ProfilUtilisateur.php");
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Mon Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/ProfilStyle.css">

  
</head>
<body>
<div class="logo">
     <img src="assets/logo.svg" alt="logo">
    </div>
   
    <?php 
include("Routes/UtilisateurRoute.php");
    ?>
     <?php
        include("Static/NavBar.php");
    
          ?>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Mon compte</div>
                <div>  </div>

                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwkmQMfn7k7MnrQ9GhzbrFFDo_OmvIdwrmQw&usqp=CAU" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">
   
  <br>
                    </div>
                    <!-- Profile picture upload button-->
                    
                </div>
            </div>
        </div>
        <div class="col-xl-8">
        <?php 
  $profilCtrl->displayUserInfo();
  ?>
        </div>
    </div>
    <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Liste des annonces non validées</div>
                <?php $profilCtrl->displayAnnonceNonValide()?>

            </div>
        </div>
       
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Liste des annonces validées par le site et en attente</div>
                <?php $profilCtrl->displayAnnonceValide()?>

            </div>
        </div>
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Liste des transactions</div>
                <?php $profilCtrl->displayTransaction()?>

            </div>
        </div>
    
  
</div>
<?php
$profilCtrl->displayFormSignal($idA, $idT, $idU);
?>



<script src="js/scriptProfil.js"></script>
</body>
</html>