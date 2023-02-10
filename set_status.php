<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="signup2.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
   <style>
     .container{
            align-content: top;
            margin: 10%;
     }
   </style>
</head>
<body>
   <?php
   session_start();

   if (($_SESSION['user']!=='driver')) {
      echo "<script language='javascript'>
            
           location.href='d_login.php';
    </script>";	}
   ?>
<header>
        <a href="#" class="logo">BOOK MY<span> AUTO </span> </a>

        <ul class="navlist">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="logout.php">logout</a></li>
            <li><a href="about.php">About us</a></li>
        </ul>

        <div class="bx bx-menu" id="menu-icon">

        </div>
    </header>
    <div class="container">
        
    <form class='' action="" method='post'>
    <h3 style='margin:10px'>status</h3>

    <?php
   
    $id=$_SESSION['id'];
    $conn=mysqli_connect("localhost","root","","auto_booking");
    $sql1="SELECT * FROM `driver` where `driver_id`='$id'";
    $result = $conn->query($sql1);
     if($result->num_rows>0)//when db records are found store in associative array...
    {
        
     while($row = $result->fetch_assoc())
     {
    $status=$row['status'];

     }
     if($status=='busy'){
        echo "<span style='color:red'>$status</span>";
     }else{
        echo "<span>$status</span>";
     }
 
  }
    ?>
    <hr>
    <label ><b>idle</b></label>
    <input type="radio"  value="idle" name="status" required>

    <label ><b>busy</b></label>
    <input type="radio"  value="busy" name="status" required>
    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" name='submit' class="signupbtn"> Update</button>
    </div>
    </form>
<?php

$conn=mysqli_connect("localhost","root","","auto_booking");
 
if(!$conn){
  echo "connect error:",mysqli_connect_error();
}

if(isset($_POST['submit']))
{

   $status=$_POST['status'];
   $id=$_SESSION['id'];


   $sql="UPDATE `driver` SET `status` = '$status' WHERE `driver`.`driver_id` ='$id' ";
   if(mysqli_query($conn,$sql)){
   // echo"record added";
   echo "<script>location.href='set_status.php'</script>";
   }
   else
   {
    echo"error".mysqli_error($conn);
   }
   mysqli_close($conn);

}	 


?>


    </div>
</body>
</html>