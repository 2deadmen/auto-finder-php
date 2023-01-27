<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            align-content: center;
            margin-top: 10%;
            
        }
        body{
          background-image:url('tuk.jpg') !important;
          background-repeat:no-repeat !important;
          background-size:cover !important

        }
        .hint{
          z-index: 10;

        }
        .link{
          color:green;
        }
    </style>
  
      <link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>
  <?php
  require('session.php');
  ?>
<header>
        <a href="#" class="logo">BOOK MY<span> AUTO </span> </a>

        <ul class="navlist">
        <li><a href="index.php" class="active">Home</a></li>
            <li><a href="logout.php">logout</a></li>
            <?php if($_SESSION['user']=='admin'){
              echo " <li><a href='admin.php'>dashboard</a></li>";
            } ?>
            <li><a href="about.php">About us</a></li>
            <?php if($_SESSION['user']=='driver'){
              echo " <li><a href='set_status.php'>Set Status</a></li>";
            } ?>
        </ul>

        <div class="bx bx-menu" id="menu-icon">

        </div>
    </header>



    <form id="form">
        
    </form>
 <div class="container "  > <div  align="center"> 
    
  <table cellpadding='10px'>
      <tr> <td>
      <label style="font-family:georgia; font-size:25px;">Initial Point:</label></td><td></td>
      </tr><tr> <td>
      <p><input type="textbox"  onkeyup="fetch2(this.value);" placeholder="starting point" id="start" style="width: 400px; height: 30px" >  </td> <td> &nbsp;
       <button type="button"  onclick='getLocation()'style="background-color:lightgreen;border:none;color:white;padding:7px 17px;font-size:16px;">use location  </button>
        </p></td></tr>
        <tr><td><div class='hint' id='hint'></div></td><td></td></tr>
     
    
      <tr><td> <label style="font-family:georgia; font-size:25px;">Destination Point:</label></td><td></td></tr> 
     <tr><td><input type="textbox"  onkeyup="fetch1(this.value);" placeholder="destination" id="stop" style="width:400px;height: 28px"></td><td>    &nbsp;<button onclick='fetchDistance()' style="background-color:lightgreen;border:none;color:white;padding:7px 17px;font-size:16px;">submit</button></td></tr>
     
    <tr><td> 
        <div class='hint' id='hints'></div></td><td></td></tr>   
   <tr></tr>   
<tr> <td>
        <h4 style="font-family:arial;font-size:28px;color:yellow">Distance:</h4></td>
        <td> &nbsp;<div style='color:black;font-weight:bolder' id='km'></div></td></tr> <tr></tr>
        <tr> <td>
   <h4 style="font-family:arial;font-size:28px;color:yellow">Price:</h4></td><td>
   &nbsp;  <div style='color:black;font-weight:bolder' id="price" ></div></td></tr>
   <tr></tr>
   <tr> <td>
   <h4 style="font-family:arial;font-size:28px;color:yellow">Suggested Road:</h4></td><td>
   &nbsp;  <div style='color:black;font-weight:bolder' id="road" ></div></td></tr>

   <tr><td><div   align='center' id="links"></div></td><td></td></tr>
   </table>
   <div style='display:none' id="test1"></div>
<div  style='display:none' id="test"></div>
   </div></div>
    <script>
//fetch live location

function getLocation()
 {
  if (navigator.geolocation) 
  {
    navigator.geolocation.getCurrentPosition(showPosition);
  } 
  else
   {
   alert( "Geolocation is not supported by this browser.")
  }
}
  
var xlat=0
var ylong=0

function showPosition(position) 
 {
 
  xlat=position.coords.latitude;
   ylong=position.coords.longitude;
   console.log(xlat,ylong)
   sessionStorage.removeItem('station')
  sessionStorage.setItem('live',"true")
 }



     //starting point
     const fetchlat=(place)=>{
      
      document.getElementById('start').value=place
      var xhttp=new XMLHttpRequest()
       
        xhttp.onreadystatechange=function()
        {         
            if(this.readyState==4 && this.status==200){
                document.getElementById('test').innerHTML=this.responseText
            }
        }
        
        xhttp.open("GET","getlat.php?q="+place,true);
        xhttp.send(); 
       
        
     }
   //destination
     const fetchlats=(place)=>{
      
      document.getElementById('stop').value=place
      var xhttp=new XMLHttpRequest()
       
        xhttp.onreadystatechange=function()
        {         
            if(this.readyState==4 && this.status==200){
                document.getElementById('test1').innerHTML=this.responseText
            }
        }
        
        xhttp.open("GET","getlats.php?q="+place,true);
        xhttp.send(); 
       
       
     }
     ///starting point
     const fetch2=(str)=>{
      
      sessionStorage.setItem('live','false')
        if(str==""){
          document.getElementById('hint').innerHTML=""
          exit()
        }
        var xhttp1=new XMLHttpRequest()
        xhttp1.onreadystatechange=function()
        {
            if(this.readyState==4 && this.status==200){
                document.getElementById('hint').innerHTML=this.responseText

            }
        }
        xhttp1.open("GET","search1.php?q="+str,true);
        xhttp1.send();
            
      }
//destination point
      const fetch1=(str)=>{
        if(str==""){
          document.getElementById('hints').innerHTML=""
          exit()
        }
        var xhttp1=new XMLHttpRequest()
        xhttp1.onreadystatechange=function()
        {
            if(this.readyState==4 && this.status==200){
                document.getElementById('hints').innerHTML=this.responseText

            }
        }
        xhttp1.open("GET","search.php?q="+str,true);
        xhttp1.send();
            
      }


        const fetchDistance=async()=>{
          let station=document.getElementById('start').value
          sessionStorage.setItem('station',station)
          let lat=document.getElementById('lat').value
          let long=document.getElementById('long').value
          lat=Number(lat)
          long=Number(long)
       
  let startlong
  let startlat
         if(sessionStorage.getItem('live')=='true'){
          startlong=Number(ylong)
          startlat=Number(xlat)
         }else {
          startlong=document.getElementById('startlong').value
          startlat=document.getElementById('startlat').value
          startlong=Number(startlong)
        startlat=Number(startlat)
         }

        const response= await fetch(`https://api.mapbox.com/directions/v5/mapbox/driving/${startlong}%2C${startlat}%3B${long}%2C${lat}?alternatives=true&geometries=geojson&language=en&overview=full&steps=true&access_token=pk.eyJ1Ijoicm9oYW4tMzYzMiIsImEiOiJjbGNhYmZ1cHkwaHZuM3dtcHZ5Nms4cXo2In0.UcBrDKD7Y2ANRyuu-KgEZg`);
        //console.log(response.status)
        let json=await response.json()
        let routes=json['routes']
        let distance=routes[0]['distance']
        distance=distance/1000
        distance=Math.round(distance)
        document.getElementById('km').innerHTML=distance +" KM"
//routes

let road=json['waypoints'][1]
road=road['name']
console.log(road)
document.getElementById('road').innerHTML= road


        //price per km
        let price=distance*10
        price=Math.round(price)
        document.getElementById('price').innerHTML=price +" Rs"
       
        if(sessionStorage.getItem('live')!=='true'){
           fetchstationdata()
        }else{
          document.getElementById('links').innerHTML=""
        }
      
      }
      function fetchstationdata(){
      let station=sessionStorage.getItem('station')
      document.getElementById('links').innerHTML="<a class='link' href='showdrivers.php' style='color:black;font-size:large;text-decoration:underline;margin-top:30px;'>show available drivers 	&rarr; </a>"
    }
    </script>

</body>
</html>