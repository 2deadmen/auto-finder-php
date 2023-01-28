<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css">

  
  <style>
    
  </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style.css">

    <title>drivers</title>
</head>
<body>
<?php
  require('session.php');
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


<h1  align='center' class=' py-5 my-5' id="station"></h1>   

<script>
        document.getElementById('station').innerHTML=sessionStorage.getItem('station')
 
    </script>
<?php
    
    $staion_id=$_SESSION['st_id'];
    require('dbconnect.php');
    
    $sql1="SELECT * FROM `driver` where `station_id`='$staion_id'";
    $result = $conn->query($sql1);
     if($result->num_rows>0)//when db records are found store in associative array...
    {
      // output data of each row

echo '<div style="color:black" class="row"> ';
  while($row = $result->fetch_assoc())
   {
    
    $sql="SELECT `ratings`,`review` FROM `rating` where `driver_id`=".$row['driver_id'];
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

 
  
echo '<div class="col-md-4">   <div class="card m-5" style="width: 18rem;">
<div class="card-body">
<h5 class="card-title">'.$row['driver_name'].'</h5>
<h6  style="color:#D7BE69" class="card-subtitle mb-2 ">'.$star.' </h6>
';
if($row['status']=='idle'){
    echo '
<p class="card-text" style="color:green">'.$row['status'].'</p>';
}else{
    echo '
<p class="card-text" style="color:red">'.$row['status'].'</p>';
}
echo '
<button class="p-3"><img src="phone-icon.png" width="30px" height="30px"/><a href="tel:'.$row['phone_number'].'" class="card-link"> '.$row['phone_number'].'</a></button>
<br>';
echo '<form action="rate.php" method="post">
<input name="id" value='.$row['driver_id'].' style="display:none">
<input type="submit" name="submit" value="Rate this worker" class="btn-primary btn my-2">
</form>';


echo "<h3>Reviews</h3>";
$sql="SELECT `ratings`,`review` FROM `rating` where `driver_id`=".$row['driver_id'];
$result1 =$conn->query($sql);

if($result->num_rows>0)//when db records are found store in associative array...
  {
while($row1= $result1->fetch_assoc()){
 
  echo "<h6>".$row1['review']."</h6><br/>";
}}

echo '  
</div></div>
</div>';
}
echo "</div>";
}

    ?>
   
</body>
</html>