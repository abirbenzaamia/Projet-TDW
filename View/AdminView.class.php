
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
          echo '<span>Votre coordonnées ne sont pas correctes</span>';
      }
      
      
}




}

?>

