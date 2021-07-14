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

	header("Location:like1.php?post_id=".$name);
}
          	
							   

else{
$query = "INSERT INTO `likes`(post_id,user_id) 
VALUES('".$name."','".$_SESSION['id']."')";

		$statement = mysqli_query($con,$query);

		$result1 = mysqli_query($con,"SELECT * FROM likes where post_id='".$name."' and user_id='".$_SESSION["id"]."'");
		while($row1 = mysqli_fetch_assoc($result1))
		{
		$query1 = "INSERT INTO `notifications`(notified_id,status)	 
		VALUES('".$row1['like_id']."','liked')";
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
				
				echo $id;
				header("Location:index.php");


}


	
}

?>