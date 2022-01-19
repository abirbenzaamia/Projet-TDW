
<?php
require_once ("Controller/AdminController.class.php");
class AdminView{
    function AdminConn($nom,$mdp)
    {
      $adminCtrl= new AdminController();
      $res = $adminCtrl->AdminConn($nom,$mdp);
      if ($res) {
        header('Location:AdminPrincipale.php');
      } else {
          echo '<span>Vos coordonnées ne sont pas correctes</span>';
      }
      
      
}
function displayGestionUtilisateur(){
  echo '   <div class="col-lg-3 col-sm-6">
  <a href="GestionUtilisateurs.php">
  <div class="card-box bg-blue">
        <div class="inner">
            <h3> Gestion </h3>
            <p>des utilisateurs</p>
         
        </div>
        <div class="icon">
        <i class="fa fa-users"></i>
        </div>
        <a href="#" class="card-box-footer">Voir plus <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </a>
  
</div>';
}
function displayGestionAnnonce(){
  echo '<div class="col-lg-3 col-sm-6">
  <a href="#">
  <div class="card-box bg-green">
        <div class="inner">
            <h3> Gestion </h3>
            <p>des annonces</p>
         
        </div>
        <div class="icon">
        <i class="bi bi-megaphone-fill"></i>
        </div>
        <a href="#" class="card-box-footer">Voir plus <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </a>
  
</div>';
}
function displayGestionNews(){
  echo '<div class="col-lg-3 col-sm-6">
  <a href="#">
  <div class="card-box bg-red">
                  <div class="inner">
                      <h3> Gestion </h3>
                      <p> des news </p>
                  </div>
                  <div class="icon">
                  <i class="bi bi-newspaper"></i>
                  </div>
                  <a href="#" class="card-box-footer">Voir plus <i class="fa fa-arrow-circle-right"></i></a>
              </div>
  </a>
             
          </div>';
}

function displayGestionContenu(){
  echo '  <div class="col-lg-3 col-sm-6">
  <a href="#">
  <div class="card-box bg-orange">
        <div class="inner">
            <h3> Gestion </h3>
            <p> du contenu </p>
        </div>
        <div class="icon">
        <i class="bi bi-body-text"></i>
        </div>
        <a href="#" class="card-box-footer">Voir plus <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </a>
   
</div>';
}
function displayGestionUtilisateurSimple(){
  echo '    <div class="col-lg-4 col-md-2 col-12 mt-4 pt-2">
  <div class="card service-wrapper rounded border-0 shadow p-4">
      <div class="icon text-center text-custom h1 shadow rounded bg-white">
          <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
</svg></span>
      </div>
      <div class="content mt-4">
          <h5 class="title">Gestion des utilisateurs simples</h5>
          <div class="mt-3">
              <a href="GestionClients.php" class="text-custom">Aller à la page de gestion <i class="mdi mdi-chevron-right"></i></a>
          </div>
      </div>
      <div class="big-icon h1 text-custom">
          <span class="uim-svg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
</svg></span>
      </div>
  </div>
</div>';
}
function displayGestionTransporteur(){
  echo '    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
  <div class="card service-wrapper rounded border-0 shadow p-4">
      <div class="icon text-center text-custom h1 shadow rounded bg-white">
          <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
<path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg></span>
      </div>
      <div class="content mt-4">
          <h5 class="title">Gestion des transporteurs</h5>
          <div class="mt-3">
              <a href="javascript:void(0)" class="text-custom">Aller à la page de gestion<i class="mdi mdi-chevron-right"></i></a>
          </div>
      </div>
      <div class="big-icon h1 text-custom">
          <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
<path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg></span>
      </div>
  </div>
</div>';

}






}

?>

