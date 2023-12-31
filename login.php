<?php

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="dbrosh7";

//create a connection
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);




if($_POST){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(mysqli_num_rows($result)==1){
        echo "login successfully";
    }else{
        echo "login failed";
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form actio=""  method="Post">
<h1 align="center">Login</h1>
<label from="email"><p align="center">
    <b>Email</b>
    <input type="email" placeholder="Email" name="email" id="email">
</input></label>
<label from="password"><p align="center">
    <b>Password</b>
    <input type="password" placeholder="password" name="password" id="email">
</input></label></p>
<p align="center"><input type="submit" value="Login" name="login" id="login"></p>


</body>
</html>