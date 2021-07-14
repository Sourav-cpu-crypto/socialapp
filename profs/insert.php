<?php
session_start();
if(!isset($_SESSION["id"]))
{
header("Location:signlog.php");
}
	$con=mysqli_connect("localhost","root","","socialapp");

if(isset($_POST['submit']))
{	
	$age=$_POST['age'];	$gender=$_POST['gender'];	$email=$_POST['email'];	$mob=$_POST['mob'];	
    $about=$_POST['about'];	
	
$filename=$_FILES["image"]["name"];	
$tempname = $_FILES["image"]["tmp_name"];
		
$folder = "images/".$filename;
	

$query = "select name from users where  id='".$_SESSION["id"]."'";

$statement = mysqli_query($con,$query);
if(mysqli_num_rows($statement)>0)
{


		 $row = mysqli_fetch_assoc($statement); 
		 $name=$row['name'];
		 
		 
}
							   
if(empty($filename))


{

$query = "update `profiles` set age='".$age."',gender='".$gender."',mob='".$mob."',
about='".$about."',photo='' where user_id='".$_SESSION['id']."'";

		$statement = mysqli_query($con,$query);
		header("Location:index.php?profile=".$_SESSION['id']);
	
}
else
{
	
	$query = "update `profiles` set age='".$age."',gender='".$gender."',mob='".$mob."',
	about='".$mob."',photo='".$filename."' where user_id='".$_SESSION['id']."'";
	
			$statement = mysqli_query($con,$query);
		
		
move_uploaded_file($tempname,$folder);
header("Location:index.php?profile=".$_SESSION['id']);


}


	
}

?>