<?php 

session_start();

	include("dbConn.php");


	if(isset($_POST)) 
	{
		//something was posted
		$email = $_POST['email'];
		$mdp= md5($_POST['mdp']) ;

		

			//read from database
			$query = "SELECT * FROM `utilisateurs` WHERE email = '$email' ";
			$result = mysqli_query($db, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['mdp'] === $mdp)
					{

						$_SESSION['id'] = $user_data['id'];
						echo "success";
					}else{
                        echo "vérifier votre mot de passe";
                    }
				}
			}else {
                echo "l'adresse email n'existe pas veuillez s'incrire";
            }
			
	
		
	}

?>