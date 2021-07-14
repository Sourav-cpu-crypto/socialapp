<?php
	$conn = mysqli_connect('localhost', 'root', '', 'socialapp');
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>