<?php
require('dbconnect.php');
$str=$_GET['q'];
$sql="select * from `station` where `station_name`='$str'";

		$result = $conn->query($sql);
		 if($result->num_rows>0)//when db records are found store in associative array...
        {
		  // output data of each row
      session_start();
	  
	  while($row = $result->fetch_assoc())
	   {
		$station_id=$row['station_id'];
		echo "<input id='startlat' value='".$row['latitude']."'><input id='startlong' value='".$row['longitude']."'>";
      }
	  $_SESSION['st_id']=$station_id;
	}

?>
  