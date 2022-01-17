
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
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
        <nav class="navBar">
            <ul class="menuItems">
              <li><a href='accueil.php' data-item='Accueil'>Accueil</a></li>
              <li><a href='presentation.php' data-item='Présentation'>Présentation</a></li>
              <li><a href='#' data-item='News'>News</a></li>
              <li><a href='inscription_page.php' data-item='Inscription'>Inscription</a></li>
              <li><a href='#' data-item='Statistiques'>Statistiques</a></li>
              <li><a href='#' data-item='Contact'>Contact</a></li>
            </ul>
          </nav>
        
   
     <form action="" class="rech">
         <label for="">Rechercher une annonce</label>
         <input type="text" name="depart" placeholder="Départ">
         <input type="text" name="depart" placeholder="Arriver">
         <a href="#"> Rechercher</a>
     </form>
   <?php

if (isset($_SESSION['id'])) {

  echo ' <div class="ajout_annonce">
     <a href="#"> Ajouter une annonce </a>
     <form  method="POST" >
       <label for="wilaya_dep">Wilaya de départ</label>
       <select name="wilaya_dep" id="dep">';
         
         include("afficher_wilayas.php");
         
      echo '</select>
      <br>
      <label for="wilaya_arv">Wilaya d arriver</label>
      <select name="wilaya_arv" id="arv">';
        
        include("afficher_wilayas.php");
        
      echo '</select>
      <br>
      <label for="type_transp">Type de transport</label>
      <select name="type_transp" id="type_transp">' ;
        //  <!-- récuperer les type de transport de la base de bonnées -->

include "dbConn.php"; 

$records = mysqli_query($db,"select * from type_transport "); // la requete sql pour récupérer la liste des wilayas de la bdd

while($data = mysqli_fetch_array($records))
{
echo '<option value="'.$data["type"].'">
'.$data["type"].'
</option>	';


}

  echo '  </select>
  <br>
  <label for="poids">Poids</label>
  <select name="poids" id="poids">';


include "dbConn.php"; 

$records = mysqli_query($db,"select * from poids "); // la requete sql pour récupérer la liste des wilayas de la bdd

while($data = mysqli_fetch_array($records))
{
echo '<option value="'.$data["id"].' ">
 '.$data["borneInf"].' '.$data["uniteInf"] .' < x < '  .$data["borneSup"].''. $data["uniteSup"].'
</option>	';


}

  echo ' </select>
  <br>
  <label for="volume">Taille de colis</label>
  <select name="volume" id="volume">
    <option value="petit">Petit</option>
    <option value="moyen">Moyen</option>
    <option value="grand">Grand</option>
  </select>
  <br>
  <label for="moy_transp">Moyen de transport</label>
  <select name="moy_transp" id="moy_transp">
    <option value="avion">Avion</option>
    <option value="voiture">Voiture</option>
    <option value="camion">Camion/camionette</option>
    <option value="train">Train</option>
    <option value="bus">Bus</option>
    <option value="bateau">Bâteau</option>
    
  </select>
  <br>
  <button type="submit" >Envoyer la demande de l annonce</button>
</form>
<span id="pub"></span>
</div>';
  

}
   
   ?>
    <div class="annonces"> 
      <div class="ligne1">
     <?php 

     include("Routes/AnnonceRoute.php");
      
         ?>
     


      </div>
      <div class="ligne2">

      </div>
    </div>
    <div class="comment">
       <a href="#">Comment cela fonctionne</a>
    </div>
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