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

	

		$result1 = mysqli_query($con,"SELECT * FROM comments where post_id='".$pid."' and user_id='".$_SESSION["id"]."'");
		while($row1 = mysqli_fetch_assoc($result1))
		{
		$query1 = "INSERT INTO `notifications`(notified_id,status)	 
		VALUES('".$row1['comment_id']."','commented')";
		}
		
				$query = mysqli_query($con,$query1);
				$id=mysqli_insert_id($con);
				$query4="select * from users";
				$result4 = mysqli_query($con,$query4);
		while($row3 = mysqli_fetch_assoc($result4))
		{
				$query3 = "  INSERT INTO `notified_user`(notification_id,user_id,status)	 
		VALUES('".$id."','".$row3["id"]."','liked')";
		$query4 = mysqli_query($con,$query3);
		
		}

	header("Location:comments.php?post_id=".$pid);

	
}

?>