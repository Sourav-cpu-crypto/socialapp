<?php
session_start();
	$con=mysqli_connect("localhost","root","","socialapp");

if(isset($_POST['submit']))
{	
$name=$_POST['msg'];
	
$filename=$_FILES["image1"]["name"];	
$tempname = $_FILES["image1"]["tmp_name"];
		
$folder = "images/".$filename;
	

          	
							   
if(empty($filename))


{

$query = "INSERT INTO `posts`(user_id,post,image,date) 
VALUES('".$_SESSION['id']."','".$name."','".$filename."',NOW())";

		$statement = mysqli_query($con,$query);
}
else
{
	

$query = "INSERT INTO `posts`(user_id,post,image,date) VALUES('".$_SESSION['id']."','".$name."',
'".$filename."',NOW())";

		$statement = mysqli_query($con,$query);	
move_uploaded_file($tempname,$folder);


}

	header("Location:index.php");
	
}

?>