<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <style>
        body
        {
          color:white;
          background-image:url('auto.jpeg')!important;
          background-repeat:no-repeat !important;
          background-size:cover!important;
          backdrop-filter:blur(10px) !important;
          font-weight:bolder;
          font-size:large;

          
        }
      
        a{
          color:white;
        }
      </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="stylesheet" href="login_form.css">
</head>
<body>
    
<form action="" method="post" style="border:1px solid #ccc">
  <div class=" my-5 w-75 container">
    <h1 class='head my-3'><center>ADMIN LOGIN</center></h1>
    
    <p>Please fill in this form to create an account. <div style='float:right'>
  <a href="login_form.php"> login</a></div></p>

    

  
    <label  class='my-3'><b>Password</b></label>
    <input type="password" placeholder="Enter Password"  id='psw' name="psw" required>
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
      <button type="submit" name='submit' class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
<?php
if(isset($_POST['submit'])){
    if($_POST['psw']=='root'){
        session_start();
        $_SESSION['user']='admin';
        echo "<script language='javascript'>
        location.href='admin.php';
     </script>";
    }else{
        echo "<script language='javascript'>
           
        alert('wrong password');
        location.href='admin_login.php';
     </script>";
    }
}

?>

</body>
</html>