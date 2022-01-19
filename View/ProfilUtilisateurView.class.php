
<?php
  session_start();
  require_once("Controller/ProfilUtilisateurController.class.php");
 class ProfilutilisateurView{

 function getProfilElement(){
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
           <li><a href='ProfilUtilisateur.php'>Modifier mon profil</a></li>
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

 }

 function getUserInfo(){  
  $profilCtrl = new ProfilUtilisateurController();
  $res = $profilCtrl->getUserInfo();
  echo ' <!-- Account details card-->
  <div class="card mb-4">
      <div class="card-header">Informations du compte</div>
      <div class="card-body">
          <form>
              <!-- nom et prénom  -->
              <div class="row gx-3 mb-3">
                  <!-- Form Group (first name)-->
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputFirstName">Nom</label>
                      <input class="form-control" id="inputFirstName" type="text" placeholder="Entrer votre nom" value="'.$res[0]['nom'].'">
                  </div>
                  <!-- Form Group (last name)-->
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputLastName">Prénom</label>
                      <input class="form-control" id="inputLastName" type="text" placeholder="Entrer votre prénom" value="'.$res[0]['prenom'].'">
                  </div>
              </div>
              <!-- Form Group (email address)-->
              <div class="mb-3">
                  <label class="small mb-1" for="inputEmailAddress"> Adresse Email</label>
                  <input class="form-control" id="inputEmailAddress" type="email" placeholder="Entrer votre adresse email" value="'.$res[0]['email'].'">
              </div>
              <!-- Numero de telephone et adresse  -->
              <div class="row gx-3 mb-3">
                  <!-- Form Group (phone number)-->
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputPhone">Numero de telephone</label>
                      <input class="form-control" id="inputPhone" type="tel" placeholder="Entrer votre numéro de téléphone" value="'.$res[0]['tel'].'">
                  </div>
                  <!-- Form Group (birthday)-->
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputBirthday">Adresse</label>
                      <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="ENtrer votre adresse" value="'.$res[0]['adr'].'">
                  </div>
              </div>
              <!-- Save changes button-->
              <button class="btn btn-primary" type="button">Sauvegarder</button>
          </form>
      </div>
  </div>';
  
}  
function VerifyTransp(){
  $profilCtrl = new ProfilUtilisateurController();
  $res = $profilCtrl->VerifyTransp();
  if ($res == 1) {
   echo "Type de compte :  Transporteur";
  } else {
    echo "Type de compte : Utilisateur simple";
  }
  

}
function getIdWilayasDep(){
  $profilCtrl = new ProfilUtilisateurController();
  $res = $profilCtrl->getIdWilayasDep();
  echo $res;     
}
function getNomWilayasDep(){
  $profilCtrl = new ProfilUtilisateurController();
  $res = $profilCtrl->getNomWilayasDep();
  echo $res;     
}
function getAnnonceNonValide(){
  $profilCtrl = new ProfilUtilisateurController();
  $res = $profilCtrl->getAnnonceNonValide();
  for ($i=0; $i < sizeof($res) ; $i++) { 
    echo ' <div class="list-group">
    <div href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
    <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
  </svg>
        <div class="d-flex gap-2 w-100 justify-content-between">
        <div>
          <h6 class="mb-0"> Annonce pour transporter un(e) '.$res[$i]['type_transp'].'</h6>
          <span class="mb-0 opacity-75">Wilaya de départ:'.$res[$i]['wilaya_dep'].' , </span>
          <span class="mb-0 opacity-75">Wilaya d arrivé:'.$res[$i]['wilaya_arv'].' , </span>
          <span class="mb-0 opacity-75">Type de transport:'.$res[$i]['type_transp'].' , </span>
          <span class="mb-0 opacity-75">Moyen de transp:'.$res[$i]['moyen_transp'].' , </span>
          <span class="mb-0 opacity-75">Taille :'.$res[$i]['taille'].'</span>
        </div>
        <small class="opacity-50 text-nowrap">Ajouté le '.$res[$i]['date_ajout'].'</small>
      </div>
    </div>
    
    
  </div>';    
  }
 
}
function getAnnonceValide(){
  $profilCtrl = new ProfilUtilisateurController();
  $res = $profilCtrl->getAnnonceNonValide();
  for ($i=0; $i < sizeof($res) ; $i++) { 
    echo ' <div class="list-group">
    <div href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
    <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
  </svg>
        <div class="d-flex gap-2 w-100 justify-content-between">
        <div>
          <h6 class="mb-0"> Annonce pour transporter un(e) '.$res[$i]['type_transp'].'</h6>
          <span class="mb-0 opacity-75">Wilaya de départ:'.$res[$i]['wilaya_dep'].' , </span>
          <span class="mb-0 opacity-75">Wilaya d arrivé:'.$res[$i]['wilaya_arv'].' , </span>
          <span class="mb-0 opacity-75">Type de transport:'.$res[$i]['type_transp'].' , </span>
          <span class="mb-0 opacity-75">Moyen de transp:'.$res[$i]['moyen_transp'].' , </span>
          <span class="mb-0 opacity-75">Taille :'.$res[$i]['taille'].' , </span>
          <span class="mb-0 opacity-75">Tarif proposé :'.$res[$i]['tarif'].'</span>
        </div>
        <small class="opacity-50 text-nowrap">Ajouté le '.$res[$i]['date_ajout'].'</small>
      </div>
    </div>
    
    
  </div>';    
  }
 
}
}


?>


