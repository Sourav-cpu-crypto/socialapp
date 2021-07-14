<?php
session_start();
if(!isset($_SESSION["id"]))
{
header('Location:../signlog.php');
}

	$con=mysqli_connect("localhost","root","","socialapp");



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
 <style type="text/css">
 * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
body {
	background-image: url(https://images.pexels.com/photos/204262/pexels-photo-204262.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
	-webkit-background-size: cover;
	background-size: cover;
	background-position: center center;
	height: 100vh;
}
.menu-area li a {
	text-decoration: none;
	color: #fff;
	letter-spacing: 1px;
	text-transform: uppercase;
	display: block;
	padding: 0 25px;
	font-size: 14px;
	line-height: 30px;
	position: relative;
	z-index: 1;
}
.menu-area li {
	list-style: none;
	display: inline-block;
}
.custom-padding {
	padding-top: 25px;
}
nav {
	position: relative;
	padding: 10px 20px 10px 10px;
	text-align: right;
	z-index: 1;
	background: #333;
	margin: 0 auto;
	width: calc(100% - 60px);
}
.logo {
	width: 15%;
	float: left;
	text-transform: uppercase;
	color: #fff;
	font-size: 25px;
	text-align: left;
	padding-left: 2%;
}
.menu-area li a:hover {
	background: tomato;
	color: #fff;
}
nav:before {
	position: absolute;
	content: '';
	left: 0;
	top: 100%;
	border-top: 10px solid #333;
	border-right: 10px solid #333;
	border-left: 10px solid transparent;
	border-bottom: 10px solid transparent;
}
nav:after {
	position: absolute;
	content: '';
	border-top: 10px solid #333;
	border-left: 10px solid #333;
	border-right: 10px solid transparent;
	border-bottom: 10px solid transparent;
	top: 100%;
	right: 0;
}

 </style>


</style>
</head>
<body>


	<div class="msg">
	<div class="custom-padding">
		<nav>
			<div class="logo">
				Logo
			</div>
			<ul class="menu-area">
				<li>
					<a href="../index.php">Home</a>
				</li>
				<li>
					<a href="../Chat/users.php">MESSAGE</a>
				</li>
				
				<li>
				<a href="../profs/index.php?profile=<?php echo $_SESSION['id']; ?>">
                        <i class="far fa-envelope"></i>
                        Profile
                    </a>
</li>
				<li>
				<a href="../Chat/php/logout.php?logout_id=<?php echo $_SESSION['id']; ?>">
					LOGOUT
				</li>
			</ul>
		</nav>
	</div>
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
				<a href="del.php?u_to='.$uto.'" class="del_btn">Cancel</a>
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
				<a href="del.php?u_from='.$row2["user_from"].'" class="del_btn">Cancel</a>
			</td>
			
		</tr>';
}

if(($uto==''.$_SESSION['id'].'' || $uform==''.$_SESSION['id'].'') && $status=='friends')
{
	if($uform ==''.$_SESSION['id'].'')
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