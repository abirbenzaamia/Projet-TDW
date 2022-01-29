
<?php

  session_start();
  require_once("Controller/AnnonceController.class.php");
 class AccueilView{

      function displaySectionRechAnnonces(){
            $AncCtrl = new AnnonceController();
            $wilayas = $AncCtrl->displayWilayas();

            echo '     <form action="ResultatsRech.php" method="GET" class="rech">
            <label for="">Rechercher une annonce</label>
            <select name="dep" placeholder="Départ">
            <option value="" disabled selected>Wilaya de départ</option>
            '.$wilayas.'
            </select>
            <select name="arv" placeholder="Arriver">
            <option value="" disabled selected>Wilaya d\'arriver</option>
            '.$wilayas.'
            </select>
            <button type="submit"> Rechercher</button>
        </form> ';
        }
        function displayFormAjoutAnnonce(){
          $AncCtrl = new AnnonceController();
          $wilayas = $AncCtrl->displayWilayas();
          $types = $AncCtrl->displayTypeTransp();
          $poids = $AncCtrl->displayPoids();
          echo '<div class="btn_ajout_annonce">
          <a > Ajouter une annonce </a>
          </div><div class="col-lg-7 contact-form__wrapper p-5 order-lg-1 ajout_annonce">
          <form  method="POST" class="contact-form form-validate" novalidate="novalidate">
          <span id="pub"></span>
              <div class="row">
              <div class="col-sm-6 mb-3">
                      <div class="form-group">
                          <label for="wilaya_dep">Wilaya de départ</label>
                          <select name="wilaya_dep" id="dep" class="form-control" aria-placeholder="Choisir">
                           '.$wilayas.'
                          </select>
                      </div>
                  </div>
 
                  <div class="col-sm-6 mb-3">
                      <div class="form-group">
                          <label for="wilaya_arv">Wilaya de arriver</label>
                          <select name="wilaya_arv" id="arv" class="form-control" >
                          '.$wilayas.'
                          </select>
                      </div>
                  </div>
 
                  <div class="col-sm-6 mb-3">
                      <div class="form-group">
                          <label class="required-field" for="type_transp">Type de transport</label>
                          <select name="type_transp" id="type_transp" class="form-control">
                          '.$types.'
                          </select>
                      </div>
                  </div>
 
                  <div class="col-sm-6 mb-3">
                      <div class="form-group">
                      <label class="required-field" for="poids">Type de transport</label>
                          <select name="poids" id="poids" class="form-control">
                          '.$poids.'
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-6 mb-3">
                      <div class="form-group">
                      <label for="volume" class="required-field">Taille de colis</label>
 <select name="volume" id="volume" class="form-control">
 <option value="petit">Petit</option>
 <option value="moyen">Moyen</option>
 <option value="grand">Grand</option>
 </select>
                      </div>
                  </div>
                  <div class="col-sm-6 mb-3">
                      <div class="form-group">
                      <label for="moy_transp" class="required-field">Moyen de transport</label>
 <select name="moy_transp" id="moy_transp"  class="form-control">
 <option value="avion">Avion</option>
 <option value="voiture">Voiture</option>
 <option value="camion">Camion/camionette</option>
 <option value="train">Train</option>
 <option value="bus">Bus</option>
 <option value="bateau">Bâteau</option>
 
 </select>
                      </div>
                  </div>
 
                  <div class="col-sm-12 mb-3">
                      <div class="form-group">
                          <label class="required-field" for="description">Description</label>
                          <textarea class="form-control" id="description" name="description" rows="4" placeholder="Je veux transporter un ....."></textarea>
                      </div>
                  </div>
 
                  <div class="col-sm-12 mb-3">
                      <button name="submit" type="submit" class="btn btn-primary">Publier</button>
                  </div>
 
              </div>
          </form>
      </div>';
      }
      function displayFormInscription(){
        $AncCtrl = new AnnonceController();
        $wilayas = $AncCtrl->displayWilayas();
          echo '<div class="wrapper">
          <h2>S\'inscrire</h2>
          <span id="exdj"></span>
          <form method="POST" action="inscription_page.php">
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
                 <div class="wilayas_dep">
                   <label for="wilayas_dep">Wilayas de départ</label>
                   <select multiple name="wilayas" id="wilayas" class="filter-multi-select">
'.$wilayas.'
                   </select>
                   <br>
                 </div>
                 <div class="wilayas_arv">
                   <label for="wilayas_arv">Wilayas d\'arriver</label>
                   <select multiple name="wilayas_arv" id="wilayas_arv" class="filter-multi-select">
'.$wilayas.'
                   </select>
                 </div>

                 <div class="cert">
                 <input type="checkbox" placeholder="checkbox" name="cocher"> 
              <p>Voulez-vous être un transporteur certifié ?</p>
                 </div>
                 
              </div>
            
            <div class="inscription">
              <button type="submit" name="inscription_btn">S\'inscrire</button>
            </div>
         
          </form>
          <div class="connexion">
             <span> Ou </span>
             <br>
             <br>
             <button  name="connexion_btn">Se Connecter</button>

           </div>
        </div>';
      }
 }
?>


