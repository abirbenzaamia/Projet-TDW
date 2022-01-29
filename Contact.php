<?php
$dir = dirname(__FILE__, 1);

require_once($dir."/Controller/ContactController.class.php");
$ContactCtrl = new ContactController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Conctact</title>
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <div class="logo">
     <img src="assets/logo.svg" alt="logo">
    </div>
   
    <?php 

include("Routes/UtilisateurRoute.php");
 
    ?>
        <?php
        include("Static/NavBar.php");
        ?>
   <section class="section gray-bg" id="contactus">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Contactez-nous</h2>
                    <p>Restez connecté avec nos actualités et nos offres spéciaux</p>
                </div>
            </div>
        </div>
        <div class="row flex-row-reverse">
          <?php
          $ContactCtrl->diplayFormContact();
          $ContactCtrl->displayContactInfo();
          ?>
        </div>
    </div>
</section>
   
         
    
   
    <!-- formulaire de connexion -->
 
    
</body>
<?php
include("Static/Footer.php");
?>
</html>

