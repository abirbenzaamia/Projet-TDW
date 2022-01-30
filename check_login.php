<?php

function check_login($con)
{
	if(isset($_SESSION['id']))
	{

		$id = $_SESSION['id'];
		$query = "SELECT * FROM `utilisateurs` WHERE id='".$id."' LIMIT 1";
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_info = mysqli_fetch_assoc($result);
			return $user_info;
		}
	}

	//redirect to login
	

}

