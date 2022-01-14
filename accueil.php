
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

include("profil_element.php");
 
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
              <li><a href='#' data-item='Accueil'>Accueil</a></li>
              <li><a href='#' data-item='Présentation'>Présentation</a></li>
              <li><a href='#' data-item='News'>News</a></li>
              <li><a href='#' data-item='Inscription'>Inscription</a></li>
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
     <div class="ajout_annonce">
     <a href="#"> Ajouter une annonce </a>
     <form action="accueil.php" method="POST" >
       <label for="wilaya_dep">Wilaya de départ</label>
       <select name="wilaya_dep" id="dep">
         <?php
         include("afficher_wilayas.php");
         ?>
       </select>
       <br>
       <label for="wilaya_arv">Wilaya d'arriver</label>
       <select name="wilaya_arv" id="arv">
         <?php
         include("afficher_wilayas.php");
         ?>
       </select>
       <br>
       <label for="type_transp">Type de transport</label>
       <select name="type_transp" id="type_transp">
         <!-- récuperer les type de transport de la base de bonnées -->
       <?php

include "dbConn.php"; 

$records = mysqli_query($db,"select * from type_transport "); // la requete sql pour récupérer la liste des wilayas de la bdd

while($data = mysqli_fetch_array($records))
{
?>
<option value="<?php echo $data['type']; ?>">
<?php echo $data['type']; ?>
</option>	
<?php
}
?>
       </select>
       <br>
       <label for="poids">Poids</label>
       <select name="poids" id="poids">
       <?php

include "dbConn.php"; 

$records = mysqli_query($db,"select * from poids "); // la requete sql pour récupérer la liste des wilayas de la bdd

while($data = mysqli_fetch_array($records))
{
?>
<option value="<?php echo $data['id']; ?>">
<?php echo $data['borneInf']; echo $data['uniteInf'];echo " < x < " ; echo $data['borneSup'];echo $data['uniteSup'];?>
</option>	
<?php
}
?>
       </select>
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
       <button>Envoyer la demande de l'annonce</button>
     </form>
     </div>
    <div class="annonces"> 
      <div class="ligne1">
        <div class="card">
            <div class="card-header">
              <img src="https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg" alt="rover" />
            </div>
            <div class="card-body">
              <h4>
                Why is the Tesla Cybertruck designed the way it
                is?
              </h4>
              <p>
                An exploration into the truck's polarising design
              </p> 
              <div class="link">
                <a href="#">
                    <span class="link-text">
                        Lire la suite
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                          </svg>
                      </span>
                </a>  
              </div>
                   
            </div>
          </div>
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