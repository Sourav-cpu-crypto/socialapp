

<?php
session_start();
if(!isset($_SESSION["id"]))
{
header("Location:signlog.php");
}
	$con=mysqli_connect("localhost","root","","socialapp");

if(isset($_GET['id']))
{	
$id=$_GET['id'];
	
     	
							   


$query = "INSERT INTO `friends`(user_to,user_from,status)
VALUES('".$id."','".$_SESSION['id']."','friend request sent')";

		$statement = mysqli_query($con,$query);

	
header("Location:index.php");




	
}

if(isset($_GET['fr']))
{	
$id=$_GET['fr'];
	
     	
							   


$query = "UPDATE `friends` set status='friends'
where user_from='".$id."' and user_to='".$_SESSION['id']."'";

		$statement = mysqli_query($con,$query);

	

		header("Location:index.php");




	
}

?>