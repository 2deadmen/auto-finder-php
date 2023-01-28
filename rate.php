<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styl.css">
    <link rel="stylesheet" href="cook.css">

  
  

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Rate Drivers</title>
</head>
<body>
<?php
  require('session.php');
  ?>  <?php
if(isset($_POST['id'])){
    $_SESSION['d_id']=$_POST['id'];
}

?>
<div class="container">
<h1 align='center' class='my-2'>Rate this Driver</h1> 

<form class='container my-5 w-50' action='rateprocess.php' method='post'>
<div class="form-group">

</div>  

  <div class="form-group">
    <label for="exampleInputPassword1">Rate from 1 to 5</label>
    <input type="range" min="0" max="5" class="form-control" name='stars' id="exampleInputPassword1" placeholder="">
  </div>
  <pre>  0            1           2           3            4           5</pre>

  <div class="form-group">
    <label for="exampleInputPassword1">comments</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name='comment'  placeholder='write about your work and yourself ' required rows="3"></textarea>
  </div>
  <button type="submit" name='submit'  class="btn btn-primary">Submit</button><br>
</form></div>
  
</body>

</html>