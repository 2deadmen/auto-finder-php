
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="login_form.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <style>
        body
        {
          background-image:url('auto2.jpeg')!important;
          background-repeat:no-repeat !important;
          background-size:cover!important;
          backdrop-filter:blur(10px) !important;
          font-weight:bolder;
          font-size:large;
         
          
        }
        a{
          color:white;
        }
        .head{
          
      
        }
    
      </style>
</head>
<body>



<form action="" method="post" style="border:1px solid #ccc">
  <div class="container w-75 my-3 h-100">
    <h1 class='my-5'><center>forgot password</center></h1>
    
    
    <div style='float:right'><a href="login_form.php">Customer login</a> <span>  &nbsp; </span>  <a href="driver_regs.php">Driver registration</a></div>

    <p>Please fill in this form to create an account.</p>
    
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
  
    <label for="customer_name"><b> name</b></label>
    <input type="text" placeholder="Enter name" name="cnm" required>

    <label for="psw"><b> new Password</b></label>
    <input type="password" placeholder="Enter Password" id='psw' name="psw" required>
    <input type="checkbox" onclick='handleshowpass()'/>show password


    <script>

       function handleshowpass(){
  var x = document.getElementById("psw");
  if(x.type==="password"){
    x.type="text";
  
  }
  else{
    x.type="password";
   
  }
  }

    </script>

    </p>

    <div class="clearfix my-5">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" name='submit' class="signupbtn">change pass</button>
    </div>
  </div>
</form>
<?php
require('dbconnect.php');

if(isset($_POST['submit'])){
    $name=$_POST['cnm'];
    $email=$_POST['email'];
    $pass=$_POST['psw'];
    $pass=md5($pass);
    $sql1="SELECT `customer_name` FROM `customer` where `email_id`='$email'";
    $result = $conn->query($sql1);
     if($result->num_rows>0)//when db records are found store in associative array...
        {
      // output data of each row
 
    while($row = $result->fetch_assoc())
     {
    $dname=$row['customer_name'];
   
     }}
     if($dname==$name){
        $sql="UPDATE `customer` SET `password` = '$pass' WHERE `customer`.`email_id` ='$email' ";
        if(mysqli_query($conn,$sql)){
        // echo"record added";
        echo "<script>alert('password changed')</script>";
        }
     }else{
        echo "<script>alert('wrong credentials')</script>";

     }

}

?>
</body>
</html>