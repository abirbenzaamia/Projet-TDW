<?php
$dir = dirname(__FILE__, 2);
 require_once($dir."/Controller/AnnonceController.class.php");
 require_once($dir."/Controller/UtilisateurController.class.php");
 class AnnonceView{

     function displayWilayas($results){
         $wilayas = '';
        for ($i=0; $i <sizeof($results) ; $i++) { 
            $wilayas = $wilayas.'<option value="'.$results[$i]['id'].'">'.$results[$i]['code'].'-'.$results[$i]['nom'].'</option>';
        }
        return $wilayas;
     }
     function displayTypeTransp($results){
         $types = '';
        for ($i=0; $i <sizeof($results) ; $i++) { 
            $types = $types.'<option value="'.$results[$i]['type'].'">'.$results[$i]['type'].'</option>';
        }
        return $types;
     }
     function displayPoids($results){
         $poids = '';
         for ($i=0; $i <sizeof($results) ; $i++) { 
             $poids = $poids.'<option value="'.$results[$i]["id"].'">
             '.$results[$i]["borneInf"].' '.$results[$i]["uniteInf"] .' < x < '  .$results[$i]["borneSup"].''. $results[$i]["uniteSup"].'
            </option>	';
         }
         return $poids;
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
              <a href="AnnonceDetails.php?id_annonce='.$res[$i]['id'].'" class="btn btn-primary">lire la suite</a>
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
      function displayAnnonceDetailsNonConn($res){
        $AnnonceCtrl = new AnnonceController();
        $detailsPoids = $AnnonceCtrl->displayPoidsDetails($res['id_poids']);  
        echo '<div class="card row-hover pos-relative py-10 px-10 mb-10 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
        <div class="row align-items-center">
        <img src="assets/'.$res['type_transp'].'.jpg" alt="">
          <div class="col-md-5 mb-3 mb-sm-0">
            <h5>
              <p href="#0" class="text-primary">Annonce pour transporter un(e) '.$res['type_transp'].'</p>
            </h5>
            <p class="text-sm"><b>Type de transport</b> '.$res['type_transp'].' </p>
            <p class="text-sm"> <b>Poids</b>   '.$detailsPoids["borneInf"].' '.$detailsPoids["uniteInf"] .' < x < '  .$detailsPoids["borneSup"].' '. $detailsPoids["uniteSup"].'</p>
            <p class="text-sm"> <b>Volume</b> '.$res['taille'].'</p> 
          </div>
          <div class="col-md-4 op-7">
            <div class="row text-center op-7">
              <div class="col px-1"><span class="iconify" data-icon="ion:paper-plane" style="color: #3a0ca3;" data-width="40" data-height="40"></span> <span class="d-block text-sm">Départ > '.$AnnonceCtrl->displayNomWilaya($res['wilaya_dep']).' </span> </div>
              <div class="col px-1"><span class="iconify" data-icon="ion:paper-plane" style="color: #3a0ca3;" data-width="40" data-height="40"></span><span class="d-block text-sm">Arriver > '.$AnnonceCtrl->displayNomWilaya($res['wilaya_arv']).' </span> </div>
            </div>
          </div>
        </div>
      </div>';

      }
      function displayAnnonceDetailsConnClient($res){
        $AnnonceCtrl = new AnnonceController();
        $detailsPoids = $AnnonceCtrl->displayPoidsDetails($res['id_poids']);  
        echo '<div class="card row-hover pos-relative py-10 px-10 mb-10 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
        <div class="row align-items-center">
        <img src="assets/'.$res['type_transp'].'.jpg" alt="" width="400px">
          <div class="col-md-5 mb-3 mb-sm-0">
            <h5>
              <p href="#0" class="text-primary">Annonce pour transporter un(e) '.$res['type_transp'].'</p>
            </h5>
            <p class="text-sm"><b>Type de transport</b> '.$res['type_transp'].' </p>
            <p class="text-sm"> <b>Poids</b>   '.$detailsPoids["borneInf"].' '.$detailsPoids["uniteInf"] .' < x < '  .$detailsPoids["borneSup"].' '. $detailsPoids["uniteSup"].'</p>
            <p class="text-sm"> <b>Volume</b> '.$res['taille'].'</p> 
            <p class="text-sm"> <b>Moyen de transport</b> '.$res['moyen_transp'].'</p> 
            <p class="text-sm"> <b>Ajouté le </b> '.$res['date_ajout'].'</p> 
            <p class="text-sm"> <b>Publié par </b> '.$res['id_utilisateur'].'</p> 
            <p class="text-sm"> <b>Tarif proposé </b> '.$res['tarif'].' DA</p> 
            <p class="text-sm"> <b>Description</b> '.$res['description'].'</p> 
          </div>
          <div class="col-md-4 op-7">
            <div class="row text-center op-7">
              <div class="col px-1"><span class="iconify" data-icon="ion:paper-plane" style="color: #3a0ca3;" data-width="40" data-height="40"></span> <span class="d-block text-sm">Départ > '.$AnnonceCtrl->displayNomWilaya($res['wilaya_dep']).' </span> </div>
              <div class="col px-1"><span class="iconify" data-icon="ion:paper-plane" style="color: #3a0ca3;" data-width="40" data-height="40"></span><span class="d-block text-sm">Arriver > '.$AnnonceCtrl->displayNomWilaya($res['wilaya_arv']).' </span> </div>
            </div>
          </div>
        </div>
      </div>';

      }
      function displayAnnonceDetailsConnTransporteur($res){
        $AnnonceCtrl = new AnnonceController();
        $detailsPoids = $AnnonceCtrl->displayPoidsDetails($res['id_poids']);  
        echo '<div class="card row-hover pos-relative py-10 px-10 mb-10 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
        <div class="row align-items-center">
        <img src="assets/'.$res['type_transp'].'.jpg" alt="" width="400px">
          <div class="col-md-5 mb-3 mb-sm-0">
            <h5>
              <p href="#0" class="text-primary">Annonce pour transporter un(e) '.$res['type_transp'].'</p>
            </h5>
            <p class="text-sm"><b>Type de transport</b> '.$res['type_transp'].' </p>
            <p class="text-sm"> <b>Poids</b>   '.$detailsPoids["borneInf"].' '.$detailsPoids["uniteInf"] .' < x < '  .$detailsPoids["borneSup"].' '. $detailsPoids["uniteSup"].'</p>
            <p class="text-sm"> <b>Volume</b> '.$res['taille'].'</p> 
            <p class="text-sm"> <b>Moyen de transport</b> '.$res['moyen_transp'].'</p> 
            <p class="text-sm"> <b>Ajouté le </b> '.$res['date_ajout'].'</p> 
            <p class="text-sm"> <b>Publié par </b> '.$res['id_utilisateur'].'</p> 
            <p class="text-sm"> <b>Tarif proposé </b> '.$res['tarif'].' DA</p> 
            <p class="text-sm"> <b>Description</b> '.$res['description'].'</p> 
            <div class="postuler">
            <a type="submit" name="post" href="AnnonceDetails.php?id_annonce='.$res['id'].'&idA='.$res['id'].'">Postuler</a>
            </div>
          </div>
          <div class="col-md-4 op-7">
            <div class="row text-center op-7">
              <div class="col px-1"><span class="iconify" data-icon="ion:paper-plane" style="color: #3a0ca3;" data-width="40" data-height="40"></span> <span class="d-block text-sm">Départ > '.$AnnonceCtrl->displayNomWilaya($res['wilaya_dep']).' </span> </div>
              <div class="col px-1"><span class="iconify" data-icon="ion:paper-plane" style="color: #3a0ca3;" data-width="40" data-height="40"></span><span class="d-block text-sm">Arriver > '.$AnnonceCtrl->displayNomWilaya($res['wilaya_arv']).' </span> </div>
            </div>
          </div>
        </div>
      </div>';

      }
     
  
      function displaySuggestionsTransp($res){
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
          <td><a type="button" class="btn btn-outline-success">Contacter</a></td>
        </tr>';
        }
        $html = $html.'</tbody>
    </table>';
    return $html;
      }

    }
?>