<?php

  $p_id=$_GET['q'];
  $str=$_GET['str'];
  require('dbconnect.php');

  $sql1="UPDATE driver
  SET acnt = 'dead', reason= '$str'
  WHERE driver_id = $p_id;";
  // $sql1 = "DELETE FROM driver WHERE driver_id=$p_id";
  if($conn->query($sql1)===TRUE)
  {
    echo "<script language='javascript'>	       
			location.href='admin.php';
	 </script>";
} 
 
?>