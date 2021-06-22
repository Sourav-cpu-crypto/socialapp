<?php
	$con=mysqli_connect("localhost","root","","socialapp");

if(isset($_POST['submit']))
{	
$name=$_POST['msg'];
	
$filename=$_FILES['image1']['name'];
if(empty($filename))

{

		$query = "INSERT INTO `posts`(post,image,date) VALUES('".$name."','".$filename."',NOW())";

		$statement = mysqli_query($con,$query);
}
else
{
	

$query = "INSERT INTO `posts`(post,image,date) VALUES('".$name."','".$filename."',NOW())";

		$statement = mysqli_query($con,$query);	
}

	header("Location:index.php");
	
}

?>