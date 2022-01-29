<?php
$dir = dirname(__FILE__, 1);

require_once($dir."/Controller/AnnonceController.class.php");
$AnnonceCtrl = new AnnonceController();
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

include("Routes/UtilisateurRoute.php");
 
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
        ?>
   
     <form action="ResultatsRech.php" method="GET" class="rech">
         <label for="">Rechercher une annonce</label>
         <select name="dep" placeholder="Départ">
         <option value="" disabled selected>Wilaya de départ</option>
         <?php
                           $AnnonceCtrl->displayWilayas();
                           ?>
         </select>
         <select name="arv" placeholder="Arriver">
         <option value="" disabled selected>Wilaya d'arriver</option>
         <?php
                           $AnnonceCtrl->displayWilayas();
                           ?>
         </select>
         <button type="submit"> Rechercher</button>
     </form>  
          <?php
          $AnnonceCtrl->displayAnnoncesValides();
          ?>
        
    <div class="comment">
       <a href="#">Comment cela fonctionne</a>
    </div>
    
    <!-- formulaire pour ajouter une annonce -->
    <?php
    $AnnonceCtrl->displayFormAjoutAnnonce();
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
     <script src="js/script.js"></script>  
</body>
<?php
include("Static/Footer.php");
?>
</html>

