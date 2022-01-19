<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/AdminAuthStyle.css" type="text/css" >
    <title>Se connecter</title>
</head>
<body>
    <div class="wrapper">
        <h2>Se connecter</h2>
        <form method="post" action="connection.php">
          <div class="utilisateur">
            <input type="text" placeholder="nom d'utilisateur" name="username" required>
          </div>
          
          <div class="mdp">
            <input type="password" placeholder="mot de passe" name="password" required>
          </div>
        
          <div class="connexion">
            <button type="submit" name="login_button">Se connecter</button>
          </div>
         
        </form>
      </div>  
<script>

</script>
</body>
</html>