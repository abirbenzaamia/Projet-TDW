<?php

session_start(); 
if (isset($_SESSION['id'])) {
    include("dbConn.php");
    include("check_login.php");
    

}

?>
  <div class="ajout_annonce">
     <a href="#"> Ajouter une annonce </a>
     <form  method="POST" >
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
       <button type="submit" >Envoyer la demande de l'annonce</button>
     </form>
     <span id="pub"></span>
     </div>