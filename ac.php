

<?php
if(!isset($_SESSION["id"]))
{
    header("location:signlog.php");
}
//process_data.php

if(isset($_POST["submit"]))
{

session_start();
      
    $con = mysqli_connect("localhost", "root", "", "socialapp");  
	

	$success = '';

	

	

	$ac = $_POST["account"];



	

		$query = "select * from users where id='".$_SESSION["id"]."'";

		$statement = mysqli_query($con,$query);
        if(mysqli_num_rows($statement)>0)
        {
    
       if($ac == 'deactive')
			    
{
    
 $sql2 = mysqli_query($con, "UPDATE users SET status = '".$ac."' WHERE id ='".$_SESSION["id"]."'");
        }
     else
     {
        $sql2 = mysqli_query($con, "UPDATE users SET status = '".$ac."' WHERE id ='".$_SESSION["id"]."'");
        echo '<script> alert("thank you for your reply your account will delete soon") </script>';
        session_destroy();
     }
             
        } 
    

	else{
        
        $success = "invalid login";    
    }
	}


	
    
    
?>
