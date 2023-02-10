<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
     
    </style>

</head>
<body>
<?php
session_start();

if (($_SESSION['user']!=='admin')) {
   echo "<script language='javascript'>
			
        location.href='admin_login.php';
 </script>";	}

?>
<header style='background-color:#2a2a2a' class='fixed-top'>
        <h1 href="#" class="logo">BOOK MY<span> AUTO </span> </h1>

        <ul class="navlist">
        <li><a href="index.php" class="active">Home</a></li>
        
            <li><a href="logout.php">logout</a></li>
            <li><a href="about.php">About us</a></li>
           
        </ul>

        <div class="bx bx-menu" id="menu-icon">

        </div>
    </header>

    <div>
      <div>&nbsp;</div>
      <div>&nbsp;</div>
      <div>&nbsp;</div>


    </div>

    <?php
    
    require('dbconnect.php');
        

    //total customers
$sql1="SELECT * FROM `driver` where acnt='active'";
$result = $conn->query($sql1);
if($result->num_rows>0)//when db records are found store in associative array...
{
 // output data of each row
$total=0;
echo '<div   style="color:black;" class="row mx-5"> ';
while($row = $result->fetch_assoc())
{
$total=$total+1;
}
echo '  <div class="card col-md-4 m-5" style="width: 18rem;">
<div class="card-body">
<h5 align="center" class="card-title">TOTAL DRIVERS</h5>
<h5 align="center" class="card-title">'.$total.'</h5>

</div>
</div>';

}

         //total customers
         $sql1="SELECT * FROM `customer`";
         $result = $conn->query($sql1);
          if($result->num_rows>0)//when db records are found store in associative array...
         {
           // output data of each row
     $total=0;
     
       while($row = $result->fetch_assoc())
        {
         $total=$total+1;
        }
        echo '  <div class="card col-md-4 m-5" style="width: 18rem;">
        <div class="card-body">
        <h5 align="center" class="card-title">TOTAL CUSTOMERS</h5>
        <h5 align="center" class="card-title">'.$total.'</h5>
        
        </div>
        </div>';
     
     }
     echo "</div>";
    ?>
<div class="container" style='margin-top:20px;'>
    
 
   
    <?php

    require('dbconnect.php');
    
    $sql1="SELECT * FROM `driver` where `acnt`='active'";
    $result = $conn->query($sql1);
     if($result->num_rows>0)//when db records are found store in associative array...
    {
      // output data of each row

echo '<div class="row"> ';
  while($row = $result->fetch_assoc())
   {
   
    $sql="SELECT `ratings` FROM `rating` where `driver_id`=".$row['driver_id'];
    $result1 =$conn->query($sql);
    $count=0;
    $sum=0;
    $star=0;
    if($result->num_rows>0)//when db records are found store in associative array...
      {
    while($row1= $result1->fetch_assoc()){
      $sum+=$row1['ratings'];
      $count=$count+1;
    }
  if($count>0){
    $star=$sum/$count;
    $star=round($star,1);
    $star=$star." star driver";
   }
   else{
    $star="no reviews yet";
   }} 


    $station='';
    $id=$row['station_id'];
    $sql="SELECT * FROM `station` where `station_id`='$id'";
    $result2 = $conn->query($sql);
     if($result2->num_rows>0)//when db records are found store in associative array...
    {
      // output data of each row


  while($row1 = $result2->fetch_assoc())
   {
   $station=$row1['station_name'];
   }}
 
   $d_id = $row['driver_id'];
echo '<div style="color:black" class="col-md-4">   <div class="card m-5" style="width: 18rem;">
<div class="card-body">
<h5 class="card-title">'.$row['driver_name'].'</h5>
<h6  style="color:#D7BE69" class="card-subtitle mb-2 ">'.$star.' </h6>

<h5 class="card-title">'.$station.'</h5>
<p id="hint" class="card-text">'.$row['status'].'</p>
<button class="m-2 p-2"><img src="phone-icon.png" width="30px" height="30px"/><a href="tel:'.$row['phone_number'].'" class="card-link"> '.$row['phone_number'].'</a></button>
<input type="button" onclick="cdelete('.$d_id.')" name="submit1" value="DELETE WORKER" class="btn-danger btn my-2">

<br>';

echo "<h3>Reviews</h3>";
$sql="SELECT `ratings`,`review` FROM `rating` where `driver_id`=".$row['driver_id'];
$result1 =$conn->query($sql);

if($result->num_rows>0)//when db records are found store in associative array...
  {
while($row1= $result1->fetch_assoc()){
 
  echo "<h6>".$row1['review']."</h6><br/>";
}}

echo '</div></div></div>';
}
echo "</div>";
}

    ?>
      <script>
            function cdelete(d_id){
               var c=confirm('do you really want to delete this worker from your website')
               if(c==true){
                let str=prompt('write the reason here..')
                var xhttp1=new XMLHttpRequest()
        xhttp1.onreadystatechange=function()
        {
            if(this.readyState==4 && this.status==200){
          
              location.reload()

            }
        }
        xhttp1.open("GET","delete.php?q="+ d_id+"&str="+str,true);
        xhttp1.send();
    }else{

               }
            }
        </script>
   
</div>
</body>
</html>