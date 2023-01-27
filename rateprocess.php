<?php
session_start();

if(isset($_POST['submit'])){

require('dbconnect.php');
$stars=$_POST['stars'];
$comment=$_POST['comment'];
$id=$_SESSION['id'];
$d_id=$_SESSION['d_id'];

if($conn->connect_error)
	  {
  		die("Connection failed:" .$conn->connect_error);
	  }
	else
	  {
        $sql2 ="INSERT INTO `rating`( `customer_id`,`review`, `ratings`,`driver_id`) VALUES ('$id','$comment','$stars','$d_id')";
        if($conn->query($sql2)===TRUE)
		 {
      echo "<script language='javascript'>
      location.href='index.php';
  </script>";
     }}}
?>