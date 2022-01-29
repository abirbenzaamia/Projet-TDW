<?php 
?>
 <div id="id01" class="modal">
  
  <form class="modal-content animate" action="accueil.php" method="post">
 
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

    <div class="container">
      <span id="erreur"></span>
      <label for="email" ><b>Email </b></label>
      <input type="email" placeholder="Entrer votre email" name="email" id="email"required>
      <label for="mdp"><b>Mot de passe</b></label>
      <input type="password" placeholder="Entrer votre mot de passe" name="mdp" id="mdp" required>
      <button type="submit">Se connecter</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
    </div>
  </form>
</div>