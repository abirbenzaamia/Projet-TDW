<?php
session_start();
 
 if (isset($_SESSION['id'])) {
  include("dbConn.php");
  include("check_login.php");
  $user_info = check_login($db);

  echo "<div class='profil_element'>
  <ul class='profile-wrapper'>
     <li>
       <!-- user profile -->
       <div class='profile'>
         <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTP7siAoPLYzYNr7HMR6jHtzUbyqrp2iDhjyA&usqp=CAU' />
         <a href='View/ProfilUtilisateurView.class.php' class='name'>".$user_info['prenom']." " .$user_info['nom']."</a>
         <!-- more menu -->
         <ul class='menu'>
           <li><a href='#'>Modifier mon profil</a></li>
           <li><a href='deconnexion.php'>Se déconnecter</a></li>
         </ul>
       </div>
     </li>
   </ul>
  </div>";
 

 } else {
   echo   "<div class='conn'>
   <a  style='width:auto;'>Se connecter</a>
   <a href='inscription.html' >S'inscrire</a>
</div>";
 }
 