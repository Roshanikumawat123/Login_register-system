<?php
  
 $db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="dbrosh7";


//create a connection
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

//die if connection was not successful
if($conn->connect_error){
    die("sorry we failed to connect: " . $conn->connect_error);
}
if(isset($_POST['email'])){
    
//$username=$_POST['username'];
$email=$_POST['email'];
if(!empty($email))
{

    //check whether the email is already registered or not.
$sql  = "SELECT * FROM users WHERE email='$email'";
//echo $sql; exit;
$query = mysqli_query($conn,  $sql);


if(  mysqli_num_rows($query)  == 0){
    echo "email does not exists";
    exit;
}
else{
    echo "email already  exits";
    exit;
}
}
}else{
?>

<form action="" method="post">
    <input type="text" name="email" />
    <input type="submit" />
    
</form>

<?php
}
?>
