<?php
require_once ("Controller/AnnonceController.class.php");

class AnnonceView{
    function getAnnonces(){
        $AnnonceCtrl = new AnnonceController();
        $res = $AnnonceCtrl->getAnnonceValide();
      
        for ($i=0; $i < sizeof($res); $i++) { 
            echo '<div class="card">';
            echo '<div class="card-header">';
            echo ' <img src="assets/'. $res[$i]['type_transp'].'.jpg" alt="rover" />';
           
             
            echo'</div>
            <div class="card-body">
              <h4>
               Demande de Transport de'.$res[$i]['type_transp'].'
              </h4>
              <p>
                Veillez me transporter un '.$res[$i]['type_transp'].' par '.$res[$i]['moyen_transp'].'
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
      </div>' ;
        }
    }
    
}



?>