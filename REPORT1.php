<?php
session_start();
if(!isset($_SESSION["id"]))
{
header("Location:signlog.php");
}
	$con=mysqli_connect("localhost","root","","socialapp");
    
if(isset($_POST['submit']))
{	

if(isset($_GET['post_id']))
{	
$name=$_GET['post_id'];
	
$report=$_POST["report"];

          	
							   


$query = "INSERT INTO `reports`(reported_at,user_id,action,report) 
VALUES('".$name."','".$_SESSION['id']."','post','".$report."')";

		$statement = mysqli_query($con,$query);

	




echo "thanku for your report";
	
}
}
?>