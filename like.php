<?php
session_start();
if(!isset($_SESSION["id"]))
{
header("Location:signlog.php");
}
	$con=mysqli_connect("localhost","root","","socialapp");

if(isset($_GET['post_id']))
{	
$name=$_GET['post_id'];
	

$result = mysqli_query($con,"SELECT * FROM likes where post_id='".$name."' and user_id='".$_SESSION["id"]."'");
$num_rows = mysqli_num_rows($result);
if($num_rows >= 1){

}
          	
							   

else{
$query = "INSERT INTO `likes`(post_id,user_id) 
VALUES('".$name."','".$_SESSION['id']."')";

		$statement = mysqli_query($con,$query);

	



}
	header("Location:index.php");

	
}

?>