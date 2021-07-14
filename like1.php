<?php
SESSION_start();
include "config.php";
if(!(isset($_SESSION["id"])))
{
    header("Location:sgnlog.php");
}
?>
<html>
<head>
<title>5 Star Rating Using PHP Mysql and jQuery AJAX</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link href='jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
<script src="jquery-3.0.0.js" type="text/javascript"></script>
<script src="jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>
<style>
ul
{
    display: table;
    table-layout: fixed;
    width: 100%;
    border: 1px solid #c2c2c2;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

li
{
    width:50%;
    text-align: center;
    display: table-row;
    background: pink;
}
span
{
    display: table-cell;
    vertical-align: middle;
    border-top: 1px solid green;
}
</style>
</head>
<body><?php
$sql2 = "SELECT * FROM likes,users where users.id=likes.user_id and post_id='".$_GET["post_id"]."' and (status!='deactive' or status!='delete')";
$result2 = mysqli_query($con, $sql2);
if (mysqli_num_rows($result2) > 0){
// output data of each row
while($row3 = mysqli_fetch_assoc($result2))
{
$comments=mysqli_num_rows($result2);
echo '

<ul>
<li><span>'.$row3['name'].' liked post</span></li>
    
</ul>';




}}



?>

</body>
</html>