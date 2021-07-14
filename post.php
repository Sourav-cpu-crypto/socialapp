<?php
session_start();
if(!isset($_SESSION["id"]))
{
header("Location:signlog.php");
}
	$con=mysqli_connect("localhost","root","","socialapp");

if(isset($_POST['submit']))
{	
$post=$_POST['msg'];
	
$filename=$_FILES["image1"]["name"];	
$tempname = $_FILES["image1"]["tmp_name"];
		
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

$query = "INSERT INTO `posts`(user_id,name,post,image,date) 
VALUES('".$_SESSION['id']."','".$name."','".$post."','".$filename."',NOW())";

		$statement = mysqli_query($con,$query);
		$id=mysqli_insert_id($con);
	
		
		$result1 = mysqli_query($con,"SELECT * FROM posts,users where post_id='".$id."' and user_id='".$_SESSION["id"]."' and posts.user_id=users.id and status!='deactive'");
		while($row1 = mysqli_fetch_assoc($result1))
		{
		$query1 = "INSERT INTO `notifications`(notified_id,status)	 
		VALUES('".$row1['post_id']."','posted')";
		}
		
				$query2 = mysqli_query($con,$query1);
}
else
{
	

	$query = "INSERT INTO `posts`(u_id,u_name,post,image,date) 
	VALUES('".$_SESSION['id']."','".$name."','".$post."','".$filename."',NOW())";

	
			$statement = mysqli_query($con,$query);
			$id=mysqli_insert_id($con);
			$result1 = mysqli_query($con,"SELECT * FROM posts where post_id='".$id."' and u_id='".$_SESSION["id"]."'");
			while($row1 = mysqli_fetch_assoc($result1))
			{
			$query1 = "INSERT INTO `notifications`(notified_id,status)	 
			VALUES('".$row1['post_id']."','posted')";
			}
			
					$query2 = mysqli_query($con,$query1);
					


					$id=mysqli_insert_id($con);
					$query4="select * from users";

					$result4 = mysqli_query($con,$query4);
			while($row3 = mysqli_fetch_assoc($result4))
			{
					$query3 = "  INSERT INTO `notified_user`(notification_id,user_id,status)	 
			VALUES('".$id."','".$row3["id"]."','active')";
			$query4 = mysqli_query($con,$query3);
			}
move_uploaded_file($tempname,$folder);


}

	header("Location:index.php");
	
}

?>