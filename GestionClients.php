<?php
include_once("View/GestionUtilisateursView.class.php");
$gestionUsrView = new GestionUtilisateursview();
include_once("Controller/GestionUtilisateursController.class.php");
$gestionUsrCtrl = new GestionUtilisateursController();
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

    <title>Gestion des clients</title>
</head>
<body class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{navOpen: false}">
        <!-- NAV -->
        <?php
$gestionUsrView->displayNavBar('Gestion des clients');
?>
        <!-- END OF NAV -->

        <!-- PAGE CONTENT -->
        <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">
            
            <section class="max-w-7xl mx-auto py-4 px-5">
                <div class="flex justify-between items-center border-b border-gray-300">
                    <h1 class="text-2xl font-semibold pt-2 pb-6">Listes des clients</h1>
                </div>

                
                <!-- TABLE -->
                <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Identifiant</th>
                                <th class="py-3 px-6 text-left">Client</th>
                                <th class="py-3 px-6 text-center">Email</th>
                                <th class="py-3 px-6 text-center">Téléphone</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                       <?php
                       $gestionUsrView->getListeClients();
                       ?>
                         </tbody>
                    </table>
                </div>
                <!-- END OF TABLE -->

                
            </section>
            <!-- END OF PAGE CONTENT -->
        </main>
    </div>
    <style>
        .w-64 {
     width: 18rem; 
     height: auto;
}
    </style>
</body>
</html>