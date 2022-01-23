<?php
include_once("View/GestionUtilisateursView.class.php");
$gestionUsrView = new GestionUtilisateursview();
include_once("Controller/GestionUtilisateursController.class.php");
$gestionUsrCtrl = new GestionUtilisateursController();
if (isset($_GET['valid'])) {
    $id = $_GET['valid'];
    $gestionUsrCtrl->validerTransporteur($id);
 }
 if (isset($_GET['bannir'])) {
    $id = $_GET['bannir'];
    $gestionUsrCtrl->bannirUtilisateur($id);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TAILWIND CSS -->
    <link href="css/tailwind.css" rel="stylesheet">
    <!-- ALPINE JS -->
    <script src="js/alpine.js" defer></script>
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>

    <title>Gestion des transporteurs</title>
    <style>
        .w-64 {
     width: 18rem; 
     height: auto;
     
}
.px-6 {
    padding-left: 0.5rem;
    padding-right: 0em; 
}
.non-valide{
    display: none;
}


    </style>
    <script>
        
$(document).ready(function(){
    $('#non-valide').click(function(){
        $('.non-valide').show();
        $('.valide').hide();
        $("#non-valide").css("color", "rgba(29,78,216,var(--tw-text-opacity))");
        $("#valide").css("color", "rgba(59,130,246,var(--tw-text-opacity))");
        
    });
    $('#valide').click(function(){
        $('.non-valide').hide();
        $('.valide').show();
        $("#valide").css("color", "rgba(29,78,216,var(--tw-text-opacity))");
        $("#non-valide").css("color", "rgba(59,130,246,var(--tw-text-opacity))");
        
    });
});
    </script>
</head>
<body class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{navOpen: false}">
        <!-- NAV -->
        <?php
$gestionUsrView->displayNavBar('Gestion des transporteurs');
?>
        <!-- END OF NAV -->

        <!-- PAGE CONTENT -->
        <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">
            
            <section class="max-w-7xl mx-auto py-4 px-5">
                <div class="flex justify-between items-center border-b border-gray-300">
                    <h1 class="text-2xl font-semibold pt-2 pb-6">Listes des clients</h1>
                </div>
                
                <ul class="flex border-b">
  <li class="-mb-px mr-1">
    <a class="bg-white inline-block border-r rounded-t py-2 px-4 text-blue-700 font-semibold" href="#" id="valide">Transporteurs validés</a>
  </li>
  <li class="mr-1">
    <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#" id="non-valide">Demande de validation des inscriptions</a>
  </li>
  
</ul>
                
                <!-- TABLE DES TRASPORTEURS VALIDÉS -->
                <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto valide">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Identifiant</th>
                                <th class="py-3 px-6 text-left">Client</th>
                                <th class="py-3 px-6 text-center">Email</th>
                                <th class="py-3 px-6 text-center">Téléphone</th>
                                <th class="py-3 px-6 text-center">Certifié</th>
                                <th class="py-3 px-6 text-center">demande de certification</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                       <?php
                       $gestionUsrView->getListeTransporteursVerif();
                       ?>
                         </tbody>
                    </table>
                </div>
                <!-- TABLE DES TRASPORTEURS NON VALIDÉS -->
                <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto non-valide">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Identifiant</th>
                                <th class="py-3 px-6 text-left">Client</th>
                                <th class="py-3 px-6 text-center">Email</th>
                                <th class="py-3 px-6 text-center">Téléphone</th>
                                <th class="py-3 px-6 text-center">Certifié</th>
                                <th class="py-3 px-6 text-center">demande de certification</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                       <?php
                       $gestionUsrView->getListeTransporteursNonVerif();
                       ?>
                         </tbody>
                    </table>
                </div>
                <!-- END OF TABLE -->

                
            </section>
            <!-- END OF PAGE CONTENT -->
        </main>
    </div>

</body>
</html>