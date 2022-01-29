<?php
class NewsView{
    function displayNews($res){
       echo '<div class="annonces "> 
       <div class="row row-cols-4">';
       for ($i=0; $i < sizeof($res); $i++) { 
          echo '  <div class="card">
          <img class="card-img-top" src="assets/News/'.$res[$i]['image'].'" alt="news image">
          <div class="card-body">
            <h6 class="card-title">'.$res[$i]['titre'].'</h6>
            <p class="card-text">'.mb_substr($res[$i]['texte'],0, 110, 'UTF-8').' ... </p>
            <a href="#" class="btn btn-primary">lire la suite</a>
          </div>
        </div>';

    }
    echo '</div>
       
           </div>';
}
}
?>