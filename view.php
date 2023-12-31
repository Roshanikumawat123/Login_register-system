
<?php
if(!isset($_SESSION['username'])){
	header('location:login.php');
	exit;
}
if(!isset($_GET['post_id'])){
	header('location:post_list.php');
	exit;
}
$post_id=$_GET['post_id'];
$query="SELECT * FROM posts WHERE post_id='$post_id'";
$result=mysqli_query($conn,$query);
$post=mysqli_fetch_assoc($result);

if(!$post){
	header('location:post_list.php');
	exit;
}

$dynamicquery="SELECT *FROM posts";
$dynamicresult=mysqli_query($conn,$dynamicquery);
while($row=mysqli_fetch_assoc($dynamicresult)){
	echo $row['post_id'];
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
	<?php include("menu.php");?>
	<h1>view post</h1>
	<h2>Title :<?php  echo $post['post_title'];?></h2>
	<p> Description:<?php echo $post['post_desc'];?></p>
	<a href="post_list.php">Back to post list</a>
</body>
</html>















<?php
/*include_once 'db.php';
if (isset($_GET['post_id'])) {
	$id = $_GET['post_id'];
	mysqli_query($conn, "SELECT * FROM posts WHERE post_id= $id");
    
	$_SESSION['user_id'] = "post view"; 
	header('location: post_list.php');
}*/
?>

