<?php
 require_once("Controller/AnnonceController.class.php");
 class AnnonceView{

     function displayWilayas($results){
        for ($i=0; $i <sizeof($results) ; $i++) { 
            echo '<option value="'.$results[$i]['id'].'">'.$results[$i]['code'].'-'.$results[$i]['nom'].'</option>';
        }
     }
     function displayTypeTransp($results){
        for ($i=0; $i <sizeof($results) ; $i++) { 
            echo '<option value="'.$results[$i]['type'].'">'.$results[$i]['type'].'</option>';
        }
     }
     function displayPoids($results){
         for ($i=0; $i <sizeof($results) ; $i++) { 
             echo'<option value="'.$results[$i]["id"].'">
             '.$results[$i]["borneInf"].' '.$results[$i]["uniteInf"] .' < x < '  .$results[$i]["borneSup"].''. $results[$i]["uniteSup"].'
            </option>	';
         }
     }
     function displayFormAjoutAnnonce(){
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
                           <?php
                           $AnnonceCtrl->displayWilayas();
                           ?>
                         </select>
                     </div>
                 </div>

                 <div class="col-sm-6 mb-3">
                     <div class="form-group">
                         <label for="wilaya_arv">Wilaya de arriver</label>
                         <select name="wilaya_arv" id="arv" class="form-control" >
                           <?php
                           $AnnonceCtrl->displayWilayas();
                           ?>
                         </select>
                     </div>
                 </div>

                 <div class="col-sm-6 mb-3">
                     <div class="form-group">
                         <label class="required-field" for="type_transp">Type de transport</label>
                         <select name="type_transp" id="type_transp" class="form-control">
                         <?php
                         $AnnonceCtrl->displayTypeTransp();
                         ?>
                         </select>
                     </div>
                 </div>

                 <div class="col-sm-6 mb-3">
                     <div class="form-group">
                     <label class="required-field" for="poids">Type de transport</label>
                         <select name="poids" id="poids" class="form-control">
                         <?php
                         $AnnonceCtrl->displayPoids();
                         ?>
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
     function displayAnnoncesValides($res){
         echo '   <div class="annonces "> 
         <div class="row row-cols-4">';
         for ($i=0; $i < sizeof($res); $i++) { 
            echo '  <div class="card">
            <img class="card-img-top" src="assets/'.$res[$i]['type_transp'].'.jpg" alt="image de '.$res[$i]['type_transp'].'">
            <div class="card-body">
              <h6 class="card-title">Annonce pour transporter un(e)'.$res[$i]['type_transp'].'</h6>
              <p class="card-text">'.mb_substr($res[$i]['description'],0, 110, 'UTF-8').' ... </p>
              <a href="#" class="btn btn-primary">lire la suite</a>
            </div>
          </div>';
          
         }
       
         echo '</div>
       
           </div>';
     }
      function displayResRech($res){
          $AnnonceCtrl = new AnnonceController();
          for ($i=0; $i <sizeof($res) ; $i++) { 
             $detailsPoids = $AnnonceCtrl->displayPoidsDetails($res[$i]['id_poids']);       
             echo '<div class="card row-hover pos-relative py-10 px-10 mb-10 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
             <div class="row align-items-center">
             <img src="assets/colis.jpg" alt="">
               <div class="col-md-5 mb-3 mb-sm-0">
                 <h5>
                   <p href="#0" class="text-primary">Annonce pour transporter un(e) '.$res[$i]['type_transp'].'</p>
                 </h5>
                 <p class="text-sm"><b>Type de transport</b> '.$res[$i]['type_transp'].' </p>
                 <p class="text-sm"> <b>Poids</b>   '.$detailsPoids["borneInf"].' '.$detailsPoids["uniteInf"] .' < x < '  .$detailsPoids["borneSup"].' '. $detailsPoids["uniteSup"].'</p>
                 <p class="text-sm"> <b>Volume</b> '.$res[$i]['taille'].'</p> 
               </div>
               <div class="col-md-4 op-7">
                 <div class="row text-center op-7">
                   <div class="col px-1"><span class="iconify" data-icon="ion:paper-plane" style="color: #3a0ca3;" data-width="40" data-height="40"></span> <span class="d-block text-sm">Départ > '.$AnnonceCtrl->displayNomWilaya($res[$i]['wilaya_dep']).' </span> </div>
                   <div class="col px-1"><span class="iconify" data-icon="ion:paper-plane" style="color: #3a0ca3;" data-width="40" data-height="40"></span><span class="d-block text-sm">Arriver > '.$AnnonceCtrl->displayNomWilaya($res[$i]['wilaya_arv']).' </span> </div>
                 </div>
               </div>
             </div>
           </div>';
          }

      }

    }
?>