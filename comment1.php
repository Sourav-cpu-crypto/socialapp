<?php
session_start();
if(!isset($_SESSION["id"]))
{
header("Location:signlog.php");
}
	$con=mysqli_connect("localhost","root","","socialapp");

if(isset($_POST['submit']))
{	
    $pid=$_POST['pid'];
$uid=$_POST['uid'];
$comment=$_POST['comment'];

    	
							   


$query = "INSERT INTO `comments`(post_id,user_id,comment) 
VALUES('".$pid."','".$uid."','".$comment."')";

		$statement = mysqli_query($con,$query);

	




	header("Location:comment.php?post_id='.$pid.'");

	
}

?>