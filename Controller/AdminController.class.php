<?php

use AdminModel as GlobalAdminModel;

require_once("Model/AdminModel.class.php");
class AdminController{
   
    function AdminConn($nom,$mdp)
    {
      $adminMdl = new AdminModel();
      $res = $adminMdl->AdminConn($nom,$mdp);
      return $res;
}
}
?>