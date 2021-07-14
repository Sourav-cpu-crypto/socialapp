<?php
include "config.php";
session_start();
if(!isset($_SESSION["id"]))
{
header("Location:../signlog.php");
}
	

if(isset($_POST['submit']))
{	
$gname=$_POST['gname'];
$gcr=$_POST['gcr'];
	

$s="select * from groups where group_name='".$gname."'";

if(mysqli_num_rows(mysqli_query($con,$s))>0)

{}
else
{
	

	$query = "INSERT INTO `groups`(group_name,group_creator_id,group_creator_name) 
	VALUES('".$gname."','".$_SESSION["id"]."','".$gcr."')";
	
			$statement = mysqli_query($con,$query);

}

}

?>