<?php
include_once("View/GestionUtilisateursView.class.php");
$gestionUsrView = new GestionUtilisateursview();
require_once("Controller/GestionAnnoncesController.class.php");
$gestionAnnCtrl = new GestionAnnoncesController();
if (isset($_GET['valider']) && isset($_GET['dep']) && isset($_GET['arv'])) {
    $id = $_GET['valider'];
    $idDep = $_GET['dep'];
    $idArv = $_GET['arv'];
    $gestionAnnCtrl->validerAnnonce($id,$idDep,$idArv);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>

    <!-- ALPINE JS -->
    <script src="js/alpine.js" defer></script>

        <!-- TAILWIND CSS -->
        
        <link href="css/tailwind.css" rel="stylesheet">
    <title>Gestion des annonces</title>
</head>
<style>
        .w-64 {
     width: 18rem; 
     height: auto;
     
}
.px-6 {
    padding-left: 0.5rem;
    padding-right: 0em; 
}
.non-valide , .archive{
    display: none;
}


    </style>
    <script>
        
$(document).ready(function(){
    $('#non-valide').click(function(){
        $('.non-valide').show();
        $('.valide').hide();
        $('.archive').hide();
        $("#non-valide").css("color", "rgba(29,78,216,var(--tw-text-opacity))");
        $("#valide").css("color", "rgba(59,130,246,var(--tw-text-opacity))");
        $("#archive").css("color", "rgba(59,130,246,var(--tw-text-opacity))");
        
    });
    $('#valide').click(function(){
        $('.non-valide').hide();
        $('.archive').hide();
        $('.valide').show();
        $("#valide").css("color", "rgba(29,78,216,var(--tw-text-opacity))");
        $("#non-valide").css("color", "rgba(59,130,246,var(--tw-text-opacity))");
        $("#archive").css("color", "rgba(59,130,246,var(--tw-text-opacity))");
        
    }); 
     $('#archive').click(function(){
        $('.non-valide').hide();
        $('.archive').show();
        $('.valide').hide();

        $("#archive").css("color", "rgba(29,78,216,var(--tw-text-opacity))");
        $("#valide").css("color", "rgba(59,130,246,var(--tw-text-opacity))");
        $("#non-valide").css("color", "rgba(59,130,246,var(--tw-text-opacity))");
        
    });
   
});
    </script>
  
<body class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{navOpen: false}">
        <!-- NAV -->
        <?php
$gestionUsrView->displayNavBar('Gestion des annonces');
?>
        <!-- END OF NAV -->

        <!-- PAGE CONTENT -->
        <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">
            
            <section class="max-w-7xl mx-auto py-4 px-5">
                <div class="flex justify-between items-center border-b border-gray-300">
                    <h1 class="text-2xl font-semibold pt-2 pb-6">Listes des annonces</h1>
                </div>
                <!-- basculer entre les annonces validées , non validées et archivées -->
                <ul class="flex border-b">
  <li class="-mb-px mr-1">
    <a class="bg-white inline-block border-r rounded-t py-2 px-4 text-blue-700 font-semibold" href="#" id="valide">Annonces validées</a>
  </li>
  <li class="mr-1">
    <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#" id="non-valide">Annonces non validées</a>
  </li>
  <li class="mr-1">
    <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#" id="archive">Annonces archivées</a>
  </li>
  
</ul>
                      <!-- TABLE DES ANNONCES VALIDÉÉES -->
                      <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto valide">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Client</th>
                                <th class="py-3 px-6 text-center">type de transport</th>
                                <th class="py-3 px-6 text-center">tarif</th>
                                <th class="py-3 px-6 text-center">Date</th>
                                <th class="py-3 px-6 text-center">Etat</th>
                                <th class="py-3 px-6 text-center">transporteur</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                        <?php

$gestionAnnCtrl->displayAnnoncesValid();

?>

                         </tbody>
                    </table>
                </div>
                  <!-- TABLE DES ANNONCES -->
                  <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto non-valide">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Identifiant</th>
                                <th class="py-3 px-6 text-left">Client</th>
                                <th class="py-3 px-6 text-center">Type de transport</th>
                                <th class="py-3 px-6 text-center">date</th>
                                <th class="py-3 px-6 text-center">actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                        <?php

$gestionAnnCtrl->displayAnnoncesNonValid();

?>
                         </tbody>
                    </table>
                </div>
                  <!-- TABLE DES ANNONCES -->
                  <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto archive">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Id</th>
                                <th class="py-3 px-6 text-left">Client</th>
                                <th class="py-3 px-6 text-center">Type de transport</th>
                                <th class="py-3 px-6 text-center">date</th>
                                <th class="py-3 px-6 text-center">actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                         
                         </tbody>
                    </table>
                </div>
        
            </section>
            <!-- END OF PAGE CONTENT -->
        </main>
     
    </div>
    <style type="text/css">

.ui-w-100 {
    width: 100px !important;
    height: auto;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24,28,33,0.012);
}

.user-view-table td:first-child {
    width: 9rem;
}
.user-view-table td {
    padding-right: 0;
    padding-left: 0;
    border: 0;
}

.text-light {
    color: #babbbc !important;
}

.card .row-bordered>[class*=" col-"]::after {
    border-color: rgba(24,28,33,0.075);
}    

.text-xlarge {
    font-size: 170% !important;
}
</style>
</body>
</html>