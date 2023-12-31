<?php
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
}

?>
