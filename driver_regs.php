<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="driver_regs2.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <style>
        body
        {
          background-image:url('rickshaw2.jpeg')!important;
          background-repeat:no-repeat !important;
          background-size:cover!important;
          backdrop-filter:blur(10px) !important;
          font-weight:bolder;
          font-size:large;
          color:white;

        }
        a{
          color:white;
        }
      
      </style>
</head>
<body>
  
<script language="javascript">
    function passwordChanged() {
        var strength = document.getElementById('strength');
        var strongRegex = new RegExp("^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{8,}).*", "g");
        var pwd = document.getElementById("psw");
        if (pwd.value.length == 0) {
            strength.innerHTML = '';
        } else if (false == enoughRegex.test(pwd.value)) {
            strength.innerHTML = 'Give atleast 8 Characters';
        } else if (strongRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:green">Strong!</span>';
            pwd.style.cssText=" box-shadow: 0 1px 5px 0 green"

        } else if (mediumRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:orange">Medium!A combination of special characters and symbols</span>';
            pwd.style.cssText=" box-shadow:0 1px 5px 0  orange"
            
        } else {
            strength.innerHTML = '<span style="color:red">Weak! Use combination of uppercase letters, lowercase letters, numbers, and symbols</span>';
          pwd.style.cssText=" box-shadow:0 1px 5px 0 red";
        }
    }

    const removestyle=()=>{
    var pwd = document.getElementById("psw");
    pwd.style.cssText=" box-shadow:0 0 white"
  }

    function handleshowpass(){
  var x = document.getElementById("psw");
  var x1 = document.getElementById("psw-repeat");
  if(x.type==="password"){
    x.type="text";
    x1.type="text";
  }
  else{
    x.type="password";
    x1.type="password";
  }
  }

</script>



<form action="" method="post" style="border:1px solid #ccc">
  <div class="w-75 container">
    <h1 class='head'>DRIVER REGISTRATION</h1>
    <p class='head'>Please fill in this form to create an account.</p>
    <div style='float:right'><a href="d_login.php"> login</a> <span>  &nbsp; </span>  <a href="login_form.php">customer login</a></div>
    <hr>



    
    <label for="driver_name"><b>Driver name</b></label>
    <input type="text" placeholder="Enter name" name="dnm" required>


    
    <label for="phone_number"><b>phone number</b></label>
    <input type="tel"   pattern="^\d{10}$" placeholder="Enter phone_number" name="pnum" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" onkeyup='passwordChanged()'onblur='removestyle()' id="psw" name="psw" required> <small id='strength'></small>
    <p id='StrengthDisp'></p>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required id="psw-repeat">
    <input type="checkbox" onclick='handleshowpass()'/>show password

    <h3>select station</h3>
    <select  name="stn" id="stn">
      <option value="">------</option>
      <?php
       $conn=new mysqli("localhost","root","","auto_booking");
       $sql = 'SELECT * FROM `station`';
       $result = $conn->query($sql);
       if($result->num_rows>0)//when db records are found store in associative array...
          {
        // output data of each row
  
      while($row = $result->fetch_assoc())
       {
       echo '<option value="'.$row['station_id'].'">'.$row['station_name'].'</option>';

       }}

      ?>
     
</select>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

<?php
 

 $conn=mysqli_connect("localhost","root","","auto_booking");
 
 if(!$conn){
   echo "connect error:",mysqli_connect_error();
 }

 if(isset($_POST['email']))
 {
    $un=$_POST['email'];
    $ps=$_POST['psw'];
    $ps=md5($ps);
    $dnm=$_POST['dnm'];
    $pnum=$_POST['pnum'];
    $stn=$_POST['stn'];
    $sql1="SELECT * FROM `driver` where `email_id`='$un'";
		$result = $conn->query($sql1);
		 if($result->num_rows>0)//when db records are found store in associative array...
        {
		 
	  echo"<script language='javascript'>
	
	  alert('user already exists');
	  location.href='driver_regs.php';
</script>";
	  }else{


    $sql="INSERT INTO `driver` (`driver_name`,`phone_number`, `email_id`, `password`,`station_id`) VALUES ('$dnm', '$pnum', '$un', '$ps',$stn)";
    if(mysqli_query($conn,$sql)){
    // echo"record added";
    echo "<script>location.href='d_login.php'</script>";
    }
    else
    {
     echo"error".mysqli_error($conn);
    }
    mysqli_close($conn);

 }	} 
 
 ?>
</body>
</html>
 
 

