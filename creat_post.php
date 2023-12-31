<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="ckeditor/ckeditor.js"></script>
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
input[type="text"]

 
{
width:50%;
padding: 7px 4px ;
margin-top:6px;
border : 1px;
outline:none;
background-color:#e9ecef;

}

textarea{
width:50%;
 padding: 7px 4px ;
margin-top:6px;
border : 1px;
outline:none;
background-color:#e9ecef;


}
button[type="submit"]{
  cursor:pointer;
  color:white;
  width:20%;
  height:30px;
  outline: none;
  border:none;
  background-color :blue;
}


</style>
</head>
<body>
<?php include("menu.php"); ?>  


<?php
require_once 'db.php';
//check if the user is not logged in
if(!isset($_SESSION['username'])){
    //user is not logged in, redirect to the login page

    
    header("Location:login.php");

    exit;
}
//check if the from was submitted
if($_SERVER['REQUEST_METHOD']==='POST'){
    //get the form data
    $post_title=$_POST['post_title'];
    $post_desc=$_POST['post_desc'];


    //validate the form data 
    if(empty($post_title)||empty($post_desc)){
        echo "please fill in all the fields";

    }else{
        //get the user id of the current logged-in user
       $username=$_SESSION['username'];
       
       /*
       $query="SELECT id FROM users WHERE username='$username'";
       $result=mysqli_query($conn,$query);
       $row=mysqli_fetch_assoc($result);
       */
       $user_id=$_SESSION['user_id'] ;
       
       //insert the post into the database
    
       $query="INSERT INTO posts ( post_title, post_desc, user_id) VALUES ('$post_title', '$post_desc',$user_id)";
      //$query="UPDATE posts SET post_title='$post_title',post_desc='$post_desc' WHERE user_id='$user_id'";
       if(mysqli_query($conn,$query)){
        //if post is inserted, redirect to the home page
        header("Location:post_list.php");
        exit;
       }else{
        echo "Error: ".mysqli_error($conn);
       }

    }
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
<div class="container"
        <h1 align="center">Creat Post</h1><br><br>

    <label from="Title"><p align="center">
            <b>   Title:</b></label>
            <input type="text" placeholder="" name="post_title" value="" required></p>
            <label from=""><p align="center">
            <b>  -:Descrption:-</b></label>

    <textarea name="post_desc" id="post_desc" cols="30" rows="10"></textarea>
</p>
<p align="center"><button type="submit" name="create">Creat</button></p>

</form>
</div>
<script>
CKEDITOR.replace('post_desc');

</script>

</body>
</html>



















