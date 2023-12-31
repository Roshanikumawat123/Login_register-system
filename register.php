<?php include("menu.php"); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
body{
  background-color:#f1f1f1;
  font-family:Arial,sans-serif;
}
.container{
  width:35%;
  margin:auto;
  padding:20px;
  background-color:#ffff;
  border-radius:5px;
  box-shadow:2px;

}
h1{
  text-align:center;
  margin-bottom:2px;
}
.from{
  
  margin-bottom:20px;
}
label{
  display:block;
  font-weight:bold;
  margin-bottom:5px;
}
input[type="text"],
input[type="email"],
input[type="password"]
 
{
width:50%;
padding: 7px 4px ;
margin-top:6px;
border : 1px;
outline:none;
background-color:#e9ecef;

}
button[type="submit"]{
  font-family:Arial,sans-serif;
  
  cursor:pointer;
  color:white;
  width:20%;
  height:30px;
  outline: none;
  border:none;
  background-color :blue;
}
button[type="button"]{
  cursor:pointer;
  color:black;
  width:20%;
  height:30px;
  background-color : blue;
}
@media screen and (max-width: 800px) {
  .container, .from,button[type="button"],button[type="submit"],input[type="text"],
input[type="email"],
input[type="password"],label {
    width: 100%; /* The width is 100%, when the viewport is 800px or smaller */
  }
}

</style>
</head>
<body>


<?php

//if($_POST){
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //retrive from data
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $retypepsw=$_POST["retypepsw"];
    
// validate input

if(empty($username)||empty($email)||empty($password)||empty($retypepsw)){
    echo "please fill all the fields";

}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "please enter a valid email";
}elseif($password!==$retypepsw){
    echo "the passwords do not match";
}
else{

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="dbrosh7";

//create a connection
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

//die if connection was not successful
if(!$conn){
    die("sorry we failed to connect: " . mysqli_connect_error());
}
else{
    echo "connection was successful<br>";
    header("Location:logout.php");
}

$sql="INSERT INTO `users` ( `username`, `psw`, `email`) VALUES ('$username', '$password', '$email')";
$result= mysqli_query($conn, $sql);

//check for the database creation success
if($result){

    echo "the recored successfully !<br>";
    //echo "<script>window.open('login.php','_self')</script>";
    }else{
    echo "the recored does not successfully because of this error-->" . mysqli_error($conn);
    } 
   
    mysqli_close($conn);
//echo "registration successfull";
}
}
?>
<div class="container">
        <h1>Register</h1>
        
<form method="post" action="" >
    <div class="from">
        
        <label from="username">
        <p align="center"><b>Username:</b></label>
            <input type="text" placeholder="enter username" name="username" id="username" onkeyup="checkUsernameAvailability(this.value)" required>

</p>
</div>
            
          <p align="center"><button type="button" id="checkAvailabilityBtn">Check</button>
            <div id="availabilityStatus"></div>
          
          
          
        </p>
         
          <label from="email"><p align="center">
                <b>Email:</b></label>
                <input type="Email" placeholder="enter email address" name="email" id="email" onkeyup="checkEmailAvailability(this.value)" required>

</p>
<p align="center"><button type="button" id="checkEmailBtn">Check</button>
<div id="availability"></div>
          
</p>
            
          
<p align="center"><label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"></p>
          
          <p align="center">  <label for="retypepsw">Retypepsw</label>
            <input type="password" class="form-control" id="retypepsw" name="retypepsw"></p>
<p align="center"><button type="submit" name="Register">Register</button></p>
</form> 
</div>
<script>
  //check for username
function checkUsernameAvailability(username){
   var xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function() {
    if(this.readyState === 4 && this.status === 200){
        var response=this.responseText;
        var availabilityStatus=document.getElementById("availabilityStatus");
        if(response==="username does not exists"){
          availabilityStatus.textContent= "username is available";
        }else{
          availabilityStatus.textContent="username is already taken";
        }
      }
  };

xhr.open("POST","check.php",true);
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhr.send("username="+username);

}
document.getElementById("checkAvailabilityBtn").addEventListener('click', function(){
  var username=document.getElementById("username").value;
if(username!==""){
 checkUsernameAvailability(username);
}else{
  alert("please enter a username");
}
});
//check for email

function checkEmailAvailability(email){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(this.readyState === 4 && this.status === 200){
      var response=this.responseText;
      var availability=document.getElementById("availability");
      if(response==="email does not exists"){
        availability.textContent= "email is not available";
      }else{
        availability.textContent= "email is  available";
      }
    }
      };

xhr.open("POST","check1.php",true);
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhr.send("email="+email);
}
document.getElementById("checkEmailAvailabilityBtn").addEventListener('click', function(){
  var email=document.getElementById("email").value;
  if(email!==""){
    checkEmailAvailability(email);
  }else{
    alert("please enter your email");
  }
});
</script>   
</body>
</html>