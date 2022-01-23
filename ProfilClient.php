<?php
include_once("View/GestionUtilisateursView.class.php");
$gestionUsrView = new GestionUtilisateursview();
include_once("Controller/GestionUtilisateursController.class.php");
$gestionUsrCtrl = new GestionUtilisateursController();

if (isset($_GET['profil'])) {
    $id = $_GET['profil'];
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ALPINE JS -->
    <script src="js/alpine.js" defer></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- TAILWIND CSS -->
        
        <link href="css/tailwind.css" rel="stylesheet">
    <title>Gestion des clients</title>
</head>
<style>
        .w-64 {
     width: 20rem; 
     height: auto;
     
}



    </style>
  
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
                    <h1 class="text-2xl font-semibold pt-2 pb-6">Profil d'un client</h1>
                </div>
                <?php

                $gestionUsrCtrl->displayProfile($id);
                ?>
        
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