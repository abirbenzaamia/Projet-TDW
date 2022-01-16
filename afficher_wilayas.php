<?php

include "dbConn.php"; 

$records = mysqli_query($db,"select * from wilayas "); // la requete sql pour récupérer la liste des wilayas de la bdd

while($data = mysqli_fetch_array($records))
{
?>
<option value="<?php echo $data['id']; ?>">
<?php echo $data['code'];echo "-"; echo $data['nom']; ?>
</option>	
<?php
}
?>