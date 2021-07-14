<?php
session_start();
if(!isset($_SESSION["id"]))
{
header("Location:signlog.php");
}
	$con=mysqli_connect("localhost","root","","socialapp");
    if(isset($_GET["update"]))
    {
        $sql="update  groups_members_active  set  status='active'
        where	group_id='".$_GET["update"]."' and group_requester_id='".$_GET["user"]."'";
        mysqli_query($con,$sql);
    }
    else{
    $querya = "select * from groups_members_active where  group_requester_id='".$_SESSION["id"]."' and   group_id='".$_GET["join"]."' ";

    $statements = mysqli_query($con,$querya);
    if(mysqli_num_rows($statements)>0)
    {
    
    
          
             
             
    }
                                   
    
else {

$query = "select name from users where  id='".$_SESSION["id"]."'";

$statement = mysqli_query($con,$query);
if(mysqli_num_rows($statement)>0)
{


		 $row = mysqli_fetch_assoc($statement); 
		 $name=$row['name'];
		 
		 
}
							   


$query1 = "INSERT INTO `groups_members_active`(group_requester_id,group_id,group_requester_name,status) 
VALUES('".$_SESSION['id']."','".$_GET["join"]."','".$name."','requested')";

		$statement1 = mysqli_query($con,$query1);
		
		
			
	
}

    }
?>