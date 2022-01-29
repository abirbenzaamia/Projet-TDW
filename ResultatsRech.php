<?php
$dir = dirname(__FILE__, 1);

require_once($dir."/Controller/AnnonceController.class.php");
$AnnonceCtrl = new AnnonceController();
if (isset($_GET['dep']) && isset($_GET['arv'])) {
    $idDep = $_GET['dep'];
    $idArv = $_GET['arv'];
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
    <title>Résultats de recherche</title>
</head>
<body>
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  
    <div class="logo">
     <img src="assets/logo.svg" alt="logo">
    </div>
   
    <?php 

include("Routes/UtilisateurRoute.php");
 
    ?>
  <br> <br> <br> <br> <br>
        <?php
        include("Static/NavBar.php");
        ?>
        <!-- resultat de recherche  -->
      
     <h2><span class="iconify" data-icon="ion:search-circle-outline" style="color: #3a0ca3;" data-width="50" data-height="50"></span>Résultat de votre rechreche</h2>
        <?php
        $AnnonceCtrl->displayResRech($idDep,$idArv);
        ?>
  
    <!-- formulaire de connexion -->
    <div id="id01" class="modal">
  
  <form class="modal-content animate" action="accueil.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <span id="erreur"></span>
      <label for="email" ><b>Email </b></label>
      <input type="email" placeholder="Entrer votre email" name="email" id="email"required>

      <label for="mdp"><b>mot de passe</b></label>
      <input type="password" placeholder="Entrer votre mot de passe" name="mdp" id="mdp" required>
        
      <button type="submit">Se connecter</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
    </div>
  </form>
</div>
</body>
<?php
include("Static/Footer.php");
?>
<style type="text/css">

.icon-1x {
    font-size: 24px !important;
}
a{
    text-decoration:none;    
}
.text-primary, a.text-primary:focus, a.text-primary:hover {
    color: #3a0ca3!important;
}
.text-black, .text-hover-black:hover {
    color: #000 !important;
}
.font-weight-bold {
    font-weight: 700 !important;
}
.card{
    max-width: 100%;
    padding:20px;
}
.card img{
    height: 130px;
    width: auto;
}
.bi{
    height: 50px;
    width: 50px;
}
</style>
</html>

