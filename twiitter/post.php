

<?php


//process_data.php

if(isset($_POST["name"]))
{
  
	$connect = new PDO("mysql:host=localhost; dbname=socialapp", "root", "");

	$success = '';

	$name = $_POST["name"];


	




	
		$query = "INSERT INTO posts(post) VALUES('".$name."')";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		



	
}

?>
