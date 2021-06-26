

<?php

//process_data.php

if(isset($_POST["email1"]))
{

session_start();
      
    $con = mysqli_connect("localhost", "root", "", "socialapp");  
	

	$success = '';

	

	$email = $_POST["email1"];

	$password = $_POST["password1"];



	$name_error = '';
	$email_error = '';
    $password_error='';
	


	if(empty($email))
	{
		$email_error = 'Email is Required';
	}
	else
	{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$email_error = 'eMail is invalid';
		}
	}

    if(empty($password))
	{
		$password_error = 'password is Required';
	}

	if($email_error == '' && $password_error == ''  )
	{
		//put insert data code here 

		$data = array(
	
			':email'		=>	$email,
            ':password'    => $password
		);

		$query = "select * from users where email='".$email."' and password='".$password."'";

		$statement = mysqli_query($con,$query);
        if(mysqli_num_rows($statement)>0)
        {
    
       
			     $row = mysqli_fetch_assoc($statement);

               $_SESSION['id'] = $row['id'];
            $success = "login successful"; 
 $sql2 = mysqli_query($con, "UPDATE users SET status = 'Active now' WHERE id = {$row['id']}");
                
     
             
        } 
    

	else{
        
        $success = "invalid login";    
    }
	}

	$output = array(
		'success'		=>	$success,
		'email_error'	=>	$email_error,
    'password_error'     =>   $password_error
	
	);

	echo json_encode($output);
	
    }
    
?>
