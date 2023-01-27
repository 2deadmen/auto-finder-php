<?php
require('dbconnect.php');
$str=$_GET['q'];
$sql="select * from `destination` where `destination_name`='$str'";

		$result = $conn->query($sql);
		 if($result->num_rows>0)//when db records are found store in associative array...
        {
		  // output data of each row
  
	  while($row = $result->fetch_assoc())
	   {
		echo "<input id='lat' value='".$row['latitude']."'><input id='long' value='".$row['longitude']."'>";
      }}

?>
  