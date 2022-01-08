
<?php
require_once('dbConn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="inscriptionStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <link rel="stylesheet" href="filter_multi_select.css" />
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="jquery-3.6.0.js"></script>
    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
    <title>Inscription</title>
</head>
<body>

<div>
 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <div class="logo">
     <img src="assets/logo.svg" alt="logo">
    </div>
    <div class="conn">
        <a href="authentification.html">Se connecter</a>
        <a href="inscription.html">S'inscrire</a>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
        <nav class="navBar">
            <ul class="menuItems">
              <li><a href='accueil.html' data-item='Accueil'>Accueil</a></li>
              <li><a href='presentation.html' data-item='Présentation'>Présentation</a></li>
              <li><a href='news.html' data-item='News'>News</a></li>
              <li><a href='#' data-item='Inscription'>Inscription</a></li>
              <li><a href='#' data-item='Statistiques'>Statistiques</a></li>
              <li><a href='#' data-item='Contact'>Contact</a></li>
            </ul>
          </nav>
       
          <div class="wrapper">
            <h2>S'inscrire</h2>
            <form method="POST" action="inscription_process.php">
              <div class="nom">
                <input type="text" placeholder="Nom" name="nom" required>
              </div>
              <div class="prenom">
                <input type="text" placeholder="Prenom" name="prenom" required>
              </div>
              <div class="email">
                <input type="email" placeholder="Email" name="email" required>
              </div>
              <div class="nmr">
                <input type="tel" placeholder="Numéro de téléphone" name="tel" required>
              </div>
              <div class="adr">
                <input type="text" placeholder="Adresse principale" name="adr" required>
              </div>
              <div class="mdp">
                <input type="password" placeholder="mot de passe" name="mdp" required>
              </div>
              <div class="cocher">
                <input type="checkbox" placeholder="checkbox" name="cocher"> 
                <p>Voulez-vous être un transporteur ?</p>
              </div>
                <div class="transp">
                  <label for="wilayas">Choisissez les wilyas que vous voulez desservir</label>
                   <div class="wilayas">
                     <select multiple name="wilayas" id="wilayas" class="filter-multi-select">
                     <?php

include "dbConn.php"; 

$records = mysqli_query($db,"select * from wilayas "); // la requete sql pour récupérer la liste des wilayas de la bdd

while($data = mysqli_fetch_array($records))
{
?>
<option value="<?php echo $data['nom']; ?>"><?php echo $data['code']; echo "-"; echo $data['nom']; ?></option>	
<?php
}
?>
                     </select>
                   </div>
                   <div class="cert">
                   <input type="checkbox" placeholder="checkbox" name="cocher"> 
                <p>Voulez-vous être un transporteur certifié ?</p>
                   </div>
                   <div class="dmnd">
                   <button  name="dmnd_btn">Envoyer une demande de certification</button>
                   </div>
                </div>
              
              <div class="connexion">
                <button type="submit" name="inscription_btn">S'inscrire</button>
              </div>
             
            </form>
          </div>  
          <script src="scriptInscription.js"></script>
          <script src="filter-multi-select-bundle.min.js"></script>
          <div>
  </div>
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