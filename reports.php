<?php
session_start();
if(!isset($_SESSION["id"]))
{
header("Location:signlog.php");
}
	$con=mysqli_connect("localhost","root","","socialapp");
    
	


$name=$_GET['post_id'];
	
$report=$_GET["report"];

         if($report==''  OR $name=='')
         {

         }
         
         else{
							   


$query = "INSERT INTO `reports`(reported_at,user_id,action,report) 
VALUES('".$name."','".$_SESSION['id']."','post','".$report."')";

		$statement = mysqli_query($con,$query);

	




echo '<script>alert("thanku for your report")</script>';
	

header("refresh:2;url=index.php?post_id=".$name);

         }
?><!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="reports.php?post_id=<?php'.$_GET["post_id"].'?>" method="post">
  <div class="container">
    <h1>Report</h1>
    
    <hr>

    <label for="email"><b>Report</b></label>
    <input type="hidden" placeholder="reason for report" name="post_id"  value="<?php echo $_GET["post_id"] ?>" id="report" required>
    <input type="text" placeholder="reason for report" name="report" id="report" required>


    <input type="submit" name="report1" class="registerbtn">Register</button>
  </div>
 
</form>

</body>
</html>
