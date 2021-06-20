<html>
<head>
</head>
<body>
<?php
session_start();
$email=$_SESSION['email'];
$con = mysqli_connect("localhost", "root", "", "socialapp");  

$sql ="select * from users where email='$email'";

$res = mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($res);
$name = $row['filename'];


echo'<h1>"'.$name.'"</h1>';

        
        echo '<img width="600" height="600" src=images/'.$name.' '; 






?>
</body>