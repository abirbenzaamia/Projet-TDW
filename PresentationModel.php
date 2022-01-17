<?php
include("dbConn.php");
$sql= " SELECT * FROM presentation ";
$result = $db->query($sql);
$results = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
      array_push($results, $row);
    }
  }
?>