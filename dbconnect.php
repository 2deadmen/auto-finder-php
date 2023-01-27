<?php

$conn=new mysqli("localhost","root","","auto_booking");
 
if(!$conn){
  echo "connect error:",mysqli_connect_error();
}
?>