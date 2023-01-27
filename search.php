<?php
require('dbconnect.php');
$str=$_GET['q'];


$sql="select * from `destination` where `destination_name` like'$str%'";

		$result = $conn->query($sql);
		 if($result->num_rows>0)//when db records are found store in associative array...
        {
		  // output data of each row
   echo "<table>";
	  while($row = $result->fetch_assoc())
	   {
		echo "<tr class='rows'><td  style='width:400px;height:30px;border:solid white;text-align:center' onclick='fetchlats(`".$row['destination_name']."`)'>
        ".$row['destination_name']."
        </td></tr>";
       }
    echo "</table>";
    }

?>