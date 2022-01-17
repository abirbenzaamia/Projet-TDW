
<?php
require_once('dbConn.php');
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
    <title>Inscription</title>
</head>
<body>

<div>
 

<script src="https://code.jquery.com/jquery-3.2.1.min.js"  crossorigin="anonymous"></script>
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
              <li><a href='accueil.php' data-item='Accueil'>Accueil</a></li>
              <li><a href='presentation.html' data-item='Présentation'>Présentation</a></li>
              <li><a href='news.html' data-item='News'>News</a></li>
              <li><a href='#' data-item='Inscription'>Inscription</a></li>
              <li><a href='#' data-item='Statistiques'>Statistiques</a></li>
              <li><a href='#' data-item='Contact'>Contact</a></li>
            </ul>
          </nav>
       <div class='head'>
         <p>
           Présentation du site 
         </p>
       </div>
        <div class='image'>
            <?php
          include("PresentationModel.php");
            //  include("dbConn.php");         
            //  $sql= " SELECT * FROM `presentation` ";
            //  $result = $db->query($sql);
        
            //  $results = array();
            //  if (mysqli_num_rows($result) > 0) {
            //      // output data of each row
            //      while($row = mysqli_fetch_assoc($result)) {
            
            //        array_push($results, $row);
            //      }
            //    }

           
            ?>
            <img src="assets/<?php
            echo $results[0]['image'];
            ?>" alt="image">
        </div>
        <div class='texte'>
            <p class='texte'>
            <?php
            echo $results[0]['texte'];
            ?>
            </p>
        </div>
        <div class='video_site'>
        <video src="<?php
            echo $results[0]['video'];
            ?>"  preload="auto" controls autoplay ></video>
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