
<?php
  session_start();
  require_once("Controller/ProfilUtilisateurController.class.php");
  require_once("check_login.php");
  require_once("Controller/AnnonceController.class.php");
  require_once("Controller/UtilisateurController.class.php");
  
 class ProfilutilisateurView{

 function getProfilElement(){
 if (isset($_SESSION['id'])) {
  include("dbConn.php");

  $user_info = check_login($db);
  echo "<div class='profil_element'>
  <ul class='profile-wrapper'>
     <li>
       <!-- user profile -->
       <div class='profile'>
         <img class='rounded-circle' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwkmQMfn7k7MnrQ9GhzbrFFDo_OmvIdwrmQw&usqp=CAU' />
         <a href='View/ProfilUtilisateurView.class.php' class='name'>".$user_info['prenom']." " .$user_info['nom']."</a>
         <!-- more menu -->
         <ul class='menu'>
           <li><a href='ProfilUtilisateur.php'>Modifier mon profil</a></li>
           <li><a href='deconnexion.php'>Se déconnecter</a></li>
         </ul>
       </div>
     </li>
   </ul>
  </div>
  ";
 

 } else {
   echo   "<div class='conn'>
   <a  href= '#0' style='width:auto;'>Se connecter</a>
   <a href='inscription.php' >S'inscrire</a>
</div>";
}
echo ' <br>
<br>
<br>
<br>
<br>';
 }

 function displayUserInfo($res){  
  echo ' <!-- Account details card-->
  <div class="card mb-4">
      <div class="card-header">Informations du compte</div>
      <div class="card-body">
          <form>
              <!-- nom et prénom  -->
              <div class="row gx-3 mb-3">
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputFirstName">Nom</label>
                      <input class="form-control" id="inputFirstName" type="text" placeholder="Entrer votre nom" value="'.$res['nom'].'">
                  </div>
                 
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputLastName">Prénom</label>
                      <input class="form-control" id="inputLastName" type="text" placeholder="Entrer votre prénom" value="'.$res['prenom'].'">
                  </div>
              </div>
              
              <div class="mb-3">
                  <label class="small mb-1" for="inputEmailAddress"> Adresse Email</label>
                  <input class="form-control" id="inputEmailAddress" type="email" placeholder="Entrer votre adresse email" value="'.$res['email'].'">
              </div>
              <!-- Numero de telephone et adresse  -->
              <div class="row gx-3 mb-3">
                 
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputPhone">Numero de telephone</label>
                      <input class="form-control" id="inputPhone" type="tel" placeholder="Entrer votre numéro de téléphone" value="'.$res['tel'].'">
                  </div>
                 
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputBirthday">Adresse</label>
                      <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="ENtrer votre adresse" value="'.$res['adr'].'">
                  </div>
              </div>
              <!-- Save changes button-->
              <button class="btn btn-primary" type="button">Sauvegarder</button>
          </form>
      </div>
  </div>';}
 

  function displayAnnonceNonValide($res){
    for ($i=0; $i < sizeof($res) ; $i++) { 
      echo '<div class="list-group">
      <div  class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
      <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
    </svg>
          <div class="d-flex gap-2 w-100 justify-content-between">
          <div>
            <h6 class="mb-0"> Annonce pour transporter un(e) '.$res[$i]['type_transp'].'</h6>
            <p class="mb-0 opacity-75"> <b>Wilaya de départ</b> '.$res[$i]['wilaya_dep'].'  </p>
            <p class="mb-0 opacity-75"> <b>Wilaya d arrivé</b> '.$res[$i]['wilaya_arv'].'  </p>
            <p class="mb-0 opacity-75"><b>Type de transport </b>'.$res[$i]['type_transp'].'  </p>
            <p class="mb-0 opacity-75"><b>Moyen de transp</b> '.$res[$i]['moyen_transp'].'  </p>
            <p class="mb-0 opacity-75"><b>Taille</b> '.$res[$i]['taille'].'  </p>
            <div class="actions">
            <a href="ProfilUtilisateur.php?id='.$res[$i]['id'].'" type="button" class="btn btn-outline-danger">Supprimer</a>
            <a href="ModifierAnnonce.php?modif='.$res[$i]['id'].'" type="button" class="btn btn-outline-primary modif">Modifier</a>
            </div>
           
          </div>
          <div >
          <small class="opacity-50 text-nowrap">Ajouté le '.$res[$i]['date_ajout'].'</small>
          <br>
          </div>
  
        </div>
      </div>  
    </div> '; 
    }
   }

 function displayAnnonceValide($res){
   $AncCtrl = new AnnonceController();
   $profilCtrl = new ProfilUtilisateurController();
   for ($i=0; $i < sizeof($res) ; $i++) { 
     $sugg = $AncCtrl->displaySuggestionsTransporteurs($res[$i]['wilaya_dep'],$res[$i]['wilaya_arv']);
     $dmd = $profilCtrl->displayDemandePostule($res[$i]['id']);
     echo ' <div class="list-group">
     <div  class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
     <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
     <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
   </svg>
         <div class="d-flex gap-2 w-100 justify-content-between">
         <div>
           <h6 class="mb-0"> Annonce pour transporter un(e) '.$res[$i]['type_transp'].'</h6>
           <p class="mb-0 opacity-75"> <b>Wilaya de départ</b> '.$res[$i]['wilaya_dep'].'  </p>
           <p class="mb-0 opacity-75"> <b>Wilaya d arrivé</b> '.$res[$i]['wilaya_arv'].'  </p>
           <p class="mb-0 opacity-75"><b>Type de transport </b>'.$res[$i]['type_transp'].'  </p>
           <p class="mb-0 opacity-75"><b>Moyen de transp</b> '.$res[$i]['moyen_transp'].'  </p>
           <p class="mb-0 opacity-75"><b>Taille</b> '.$res[$i]['taille'].'  </p>
           <p class="mb-0 opacity-75"><b>Tarif proposé </b>'.$res[$i]['tarif'].' DA</p>
           <div class="actions">
           <a href="ProfilUtilisateur.php?id='.$res[$i]['id'].'"  type="button" class="btn btn-outline-danger">Supprimer</a>
           <a  href="ModifierAnnonce.php?modif='.$res[$i]['id'].'" type="button" class="btn btn-outline-primary modif">Modifier</a>
           </div>
           <div class="suggestion">
           <p> <b>Suggestion des Transporteurs</b></p>
           '.$sugg.'
                    </div>
                    <div class="suggestion">
           <p> <b>Demande de postule</b></p>
           '.$dmd.'
                    </div>
          
         </div>
         <div >
         <small class="opacity-50 text-nowrap">Ajouté le '.$res[$i]['date_ajout'].'</small>
         
         <br>
         </div>
        
       </div>
     </div>  
     
   </div>';    
   }
 }
     function displayTransaction($res){
      for ($i=0; $i < sizeof($res) ; $i++) { 
        echo ' <div class="list-group">
        <div  class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
        <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
      </svg>
            <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h6 class="mb-0"> Annonce pour transporter un(e) '.$res[$i]['type_transp'].'</h6>
              <p class="mb-0 opacity-75"> <b>Wilaya de départ</b> '.$res[$i]['wilaya_dep'].'  </p>
              <p class="mb-0 opacity-75"> <b>Wilaya d arrivé</b> '.$res[$i]['wilaya_arv'].'  </p>
              <p class="mb-0 opacity-75"><b>Type de transport </b>'.$res[$i]['type_transp'].'  </p>
              <p class="mb-0 opacity-75"><b>Moyen de transp</b> '.$res[$i]['moyen_transp'].'  </p>
              <p class="mb-0 opacity-75"><b>Taille</b> '.$res[$i]['taille'].'  </p>
              <p class="mb-0 opacity-75"><b>Tarif proposé </b>'.$res[$i]['tarif'].' DA</p>
              <p class="mb-0 opacity-75"><b>Transporté par</b> '.$res[$i]['idTC'].$res[$i]['idTNC'].'</p>
              <div class="actions">
              <a href="ProfilUtilisateur.php?id='.$res[$i]['id'].'"  type="button" class="btn btn-outline-danger">Supprimer</a>
              <a type="button" class="btn btn-outline-success">Noter</a>
              <a href="SignalerTransporteur.php?idU='.$res[$i]['id_utilisateur'].'&idT='.$res[$i]['idTC'].$res[$i]['idTNC'].'&idA='.$res[$i]['id'].'" type="button" class="btn btn-outline-warning">Signaler</a>
              </div>
             
            </div>
            <div >
            <small class="opacity-50 text-nowrap">Ajouté le '.$res[$i]['date_ajout'].'</small>
            <br>
            </div>
    
          </div>
        </div>  
      </div>';    
      }
    }
      function displayFormModif($res){
        $AncCtrl = new AnnonceController();
        $wilayas = $AncCtrl->displayWilayas();
        $types = $AncCtrl->displayTypeTransp();
        $poids = $AncCtrl->displayPoids();
       echo'<div id="id01" class="modal">
      
       <form class="modal-content animate" action="" method="post">
      
           <span onclick="document.getElementById(\'id01\').style.display=\'none\'" class="close" title="Close Modal">&times;</span>
     
         <div class="container">
           <span id="erreur"></span>
           <label for="wilaya_dep">Wilaya de départ</label>
                               <select name="wilaya_dep" id="dep" class="form-control" aria-placeholder="Choisir">
                               <option value="'.$res['wilaya_dep'].'" disabled selected hidden>'.$res['wilaya_dep'].'-'.$AncCtrl->displayNomWilaya($res['wilaya_dep']).'</option>
                                '.$wilayas.'
                               </select>
                               <label for="wilaya_arv">Wilaya de arriver</label>
                               <select name="wilaya_arv" id="arv" class="form-control" >
                               <option value="'.$res['wilaya_arv'].'" disabled selected hidden>'.$res['wilaya_arv'].'-'.$AncCtrl->displayNomWilaya($res['wilaya_dep']).'</option>
                               '.$wilayas.'
                               </select>
                               <label class="required-field" for="type_transp">Type de transport</label>
                               <select name="type_transp" id="type_transp" class="form-control">
                               <option value="'.$res['type_transp'].'" disabled selected hidden>'.$res['type_transp'].'</option>
                               '.$types.'
                               </select>
                               <label class="required-field" for="poids">Type de transport</label>
                               <select name="poids" id="poids" class="form-control">
                               '.$poids.'
                               </select>
                               <label for="volume" class="required-field">Taille de colis</label>
      <select name="volume" id="volume" class="form-control">
      <option value="'.$res['taille'].'" disabled selected hidden>'.$res['taille'].'</option>
      <option value="petit">Petit</option>
      <option value="moyen">Moyen</option>
      <option value="grand">Grand</option>
      </select>
      <label for="moy_transp" class="required-field">Moyen de transport</label>
      <select name="moy_transp" id="moy_transp"  class="form-control">
      <option value="'.$res['moyen_transp'].'" disabled selected hidden>'.$res['moyen_transp'].'</option>
      <option value="avion">Avion</option>
      <option value="voiture">Voiture</option>
      <option value="camion">Camion/camionette</option>
      <option value="train">Train</option>
      <option value="bus">Bus</option>
      <option value="bateau">Bâteau</option>
      
      </select>
      <label class="required-field" for="description">Description</label>
                               <textarea class="form-control" id="description" name="description" rows="4" placeholder="'.$res['description'].'"></textarea>
           <button type="submit" name="modif" >Modifier</button>
         </div>
     
         <div class="container" style="background-color:#f1f1f1">
           <button type="button" onclick="document.getElementById(\'id01\').style.display=\'none\'" class="cancelbtn">Annuler</button>
         </div>
       </form>
     </div>';
      }
      function displayFormSignal($idA, $idT, $idU){
        $utilisateurController = new UtilisateurController();
        $infoU = $utilisateurController->getNomPrenomUtilisateur($idU);
        $infoT = $utilisateurController->getNomPrenomUtilisateur($idT);
    echo ' <div id="id01" class="modal">
  
    <form class="modal-content animate" action="#" method="POST">
   
        <span onclick="document.getElementById(\'id01\').style.display=\'none\'" class="close" title="Close Modal">&times;</span>
  
      <div class="container">
        <span id="erreur"></span>
        <label for="utilisateur" ><b>Nom et prénom de l\'utilisateur </b></label>
        <input type="text" placeholder="'.$infoU['nom'].' '.$infoU['prenom'].'" name="idU" value="'.$idU.'" >
        <label for="transp" ><b>Nom et prénom du transporteur </b></label>
        <input type="text" placeholder="'.$infoT['nom'].' '.$infoT['prenom'].'" name="idT" value="'.$idT.'" >
        <label for="utilisateur" ><b>Identifiant de l\'annonce </b></label>
        <input type="text" placeholder="'.$idA.'" name="idA" value="'.$idA.'">
        <label for="cause" ><b>cause </b></label>
        <input type="text" placeholder="cause ..." name="cause" required>
        <button type="submit" name="signal">Signaler</button>
      </div>
  
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById(\'id01\').style.display=\'none\'" class="cancelbtn">Annuler</button>
      </div>
    </form>
  </div>';
      }

      function displayDemandePostule($res){
        $html = '';
        $utilisateurCtrl = new UtilisateurController();
        $html = '<table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>';
        for ($i=0; $i <sizeof($res) ; $i++) { 
          $infoU = $utilisateurCtrl->getNomPrenomUtilisateur($res[$i]['idT']);
          $html=$html.'  <tr>
          <th scope="row">'.$res[$i]['idT'].'</th>
          <td>'.$infoU['nom'].'</td>
          <td>'.$infoU['prenom'].'</td>
          <td><a href="ProfilUtilisateur.php?idA='.$res[$i]['idA'].'&idT='.$res[$i]['idT'].'" type="button" class="btn btn-outline-success">Confirmer</a></td>
        </tr>';
        }
        $html = $html.'</tbody>
    </table>';
    return $html;
      }


  
}

?>


