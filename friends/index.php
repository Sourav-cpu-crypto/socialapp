<?php
	$con=mysqli_connect("localhost","root","","socialapp");
session_start();
if(!isset($_SESSION["id"]))
{
header('Location:../signlog.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<body>

	<div class="msg">
		
	</div>
<table>
	<thead>
		<tr>
			<th>Name</th>
	
			<th colspan="4">Action</th>
		</tr>
	</thead>
	<?php
		
			$sql1 = "SELECT * FROM users  where  id !='".$_SESSION["id"]."'";
    $result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) > 0){
  // output data of each row
  while($row1 = mysqli_fetch_assoc($result1))
{
	$name=$row1["name"];


	$sql12 = "SELECT * FROM friends where  (user_to ='".$_SESSION["id"]."' or user_from ='".$_SESSION["id"]."') 
	AND (user_to ='".$row1["id"]."' or user_from ='".$row1["id"]."')";
    $result2 = mysqli_query($con, $sql12);
if (mysqli_num_rows($result2) > 0){
  // output data of each row
  while($row2 = mysqli_fetch_assoc($result2))
{
	$uform=$row2["user_from"];
	$uto=$row2["user_to"];
	$status=$row2["status"];
	if($uform==''.$_SESSION['id'].''  && $status=='friend request sent')
{
	echo'

		<tr>
			<td>'.$name.'</td>
		
			<td>
				<a href="" class="edit_btn" >Friend request sent</a>
			</td>
			<td>
				<a href="server.php" class="del_btn">Cancel</a>
			</td>
			
		</tr>';
}

if($uto==''.$_SESSION['id'].'' && $status=='friend request sent')
{
	echo'

		<tr>
			<td>'.$name.'</td>
		
			<td>
				<a href="add.php?fr='.$row1['id'].'"class="edit_btn" >accept Friend request sent</a>
			</td>
			<td>
				<a href="server.php" class="del_btn">Cancel</a>
			</td>
			
		</tr>';
}

if(($uto==''.$_SESSION['id'].'' || $uform==''.$_SESSION['id'].'') && $status=='friends')
{
	echo'

		<tr>
			<td>'.$name.'</td>
		
			<td>
				<a href=""class="edit_btn" >Friends</a>
			</td>
			<td>
				<a href="server.php" class="del_btn">Cancel</a>
			</td>
			
		</tr>';
}

}
}












else{








echo'

		<tr>
			<td>'.$name.'</td>
		
			<td>
				<a href="add.php?id='.$row1['id'].'" class="edit_btn" >Add  Friend</a>
			</td>
			<td>
				<a href="server.php" class="del_btn">Cancel</a>
			</td>
			
		</tr>';
}
	}
}
		?>
	</table>

</body>
</html>