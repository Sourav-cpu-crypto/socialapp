

<?php
include "config.php";

//process_data.php

if(isset($_POST["name"]))
{
    
	sleep(5);
	$connect = new PDO("mysql:host=localhost; dbname=socialapp", "root", "");

	$success = '';

	$name = $_POST["name"];

	$email = $_POST["email"];

	$password = $_POST["password"];

	


	$name_error = '';
	$email_error = '';
    $password_error='';
	


	if(empty($name))
	{
		$name_error = 'Name is Required';
	}
	else
	{
		if(!preg_match("/^[a-zA-Z-' ]*$/", $name))
		{
			$name_error = 'Only Letters and White Space Allowed';
		}
	}

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

	if($name_error == '' && $email_error == '' && $password_error == '' )
	{
		//put insert data code here 

		$data = array(
			':name'			=>	$name,
			':email'		=>	$email,
            ':password'    => $password
		);

		$query = "INSERT INTO users(name,email,password,status) VALUES('".$name."','".$email."','".$password."','')";

		$statement = mysqli_query($con,$query);

		

		$success = "Data Saved";
		$id=mysqli_insert_id($con);
		$prof="insert into `profiles`(user_id,age,gender,email,mob,about,photo)
		values('".$id."',0,'','',0,'','')";
		mysqli_query($con,$prof);
	
	}

	$output = array(
		'success'		=>	$success,
		'name_error'	=>	$name_error,
		'email_error'	=>	$email_error,
    'password_error'     =>   $password_error
	
	);

	echo json_encode($output);
	
}

?>
