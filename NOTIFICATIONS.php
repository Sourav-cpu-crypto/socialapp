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
    * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
body {
	background-image: url(https://images.pexels.com/photos/204262/pexels-photo-204262.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
	-webkit-background-size: cover;
	background-size: cover;
	background-position: center center;
	height: 100vh;
}
.menu-area li a {
	text-decoration: none;
	color: #fff;
	letter-spacing: 1px;
	text-transform: uppercase;
	display: block;
	padding: 0 25px;
	font-size: 14px;
	line-height: 30px;
	position: relative;
	z-index: 1;
}
.menu-area li {
	list-style: none;
	display: inline-block;
}
.custom-padding {
	padding-top: 25px;
}
nav {
	position: relative;
	padding: 10px 20px 10px 10px;
	text-align: right;
	z-index: 1;
	background: #333;
	margin: 0 auto;
	width: calc(100% - 60px);
}
.logo {
	width: 15%;
	float: left;
	text-transform: uppercase;
	color: #fff;
	font-size: 25px;
	text-align: left;
	padding-left: 2%;
}
.menu-area li a:hover {
	background: tomato;
	color: ;
}
nav:before {
	position: absolute;
	content: '';
	left: 0;
	top: 100%;
	border-top: 10px solid #333;
	border-right: 10px solid #333;
	border-left: 10px solid transparent;
	border-bottom: 10px solid transparent;
}
nav:after {
	position: absolute;
	content: '';
	border-top: 10px solid #333;
	border-left: 10px solid #333;
	border-right: 10px solid transparent;
	border-bottom: 10px solid transparent;
	top: 100%;
	right: 0;
}

ul
{

    font-size: 329%;
    display: table;
    table-layout: fixed;
    width: 100%;
    border: 1px solid #c2c2c2;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

li
{
    background: yellowgreen;
    width:20%;
    text-align: center;
    display: table-row;

}
span
{
    display: table-cell;
    vertical-align: middle;
    border-top: 1px solid green;
}

 
 </style>

</head>
<body>
<div class="msg">
	<div class="custom-padding">
		<nav>
			<div class="logo">
				SEO WEB
			</div>
			<ul class="menu-area">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="Chat/users.php">MESSAGE</a>
				</li>
				
				<li>
				<a href="profs/index.php?profile=<?php echo $_SESSION['id']; ?>">
                        <i class="far fa-envelope"></i>
                        Profile
                    </a>
</li>
				<li>
				<a href="Chat/php/logout.php?logout_id=<?php echo $_SESSION['id']; ?>">
					LOGOUT
				</li>
			</ul>
		</nav>
	</div>
	</div>
    <?php
$sql2 = mysqli_query($con, "UPDATE notified_user SET status ='deactive' WHERE user_id ='".$_SESSION["id"]."'");

$sqls = "SELECT * FROM notified_user,notifications where notified_user.notification_id=notifications.notification_id and notified_user.user_id='".$_SESSION['id']."' order by notifications.notification_id asc";
$results= mysqli_query($con, $sqls);
if (mysqli_num_rows($results) > 0){
    while($rows = mysqli_fetch_assoc($results))
{
    if($rows["status"] =='liked')
    {
$sql2 = "SELECT * FROM notifications,likes,users,posts where notifications.notified_id=likes.like_id  and  notifications.notified_id='".$rows["notified_id"]."' and notifications.status='liked' and likes.post_id=posts.post_id and likes.user_id=users.id  ";
$result2 = mysqli_query($con, $sql2);
if (mysqli_num_rows($result2) > 0){
// output data of each row
while($row3 = mysqli_fetch_assoc($result2))
{
$comments=mysqli_num_rows($result2);
if($row3["user_id"] == $row3["u_id"] && ($row3["user_id"] == $_SESSION["id"]))
{echo '

    <ul>
    <li><span>
     <a href="like1.php?post_id='.$row3['post_id'].'">you LIKED your post. of '.$row3['date'].'</a></span></li>
        
    </ul>';}
    else if (($row3["user_id"] != $row3["u_id"])  AND ($_SESSION["id"] == $row3["u_id"])){

echo '

<ul>
<li><span>
 <a href="post.php?post_id='.$row3['name'].'">'.$row3['name'].'.LIKED  your.post of '.$row3['date'].'</a></span></li>
    
</ul>';}
else if (($row3["user_id"] != $row3["u_id"])  AND ($_SESSION["id"] == $row3["user_id"])){

    echo '
    
    <ul>
    <li><span>
     <a href="post.php?post_id='.$row3['name'].'"> you.LIKED  .post of '.$row3['u_name'].'on'.$row3['date'].'</a></span></li>
        
    </ul>';}

else
{
  
echo '

<ul>
<li><span>
 <a href="post.php?post_id='.$row3['name'].'">'.$row3['name'].'.LIKED '.$row3['u_name'].' .post of '.$row3['date'].'</a></span></li>
    
</ul>';  
}

}}
}
else if($rows["status"] =='posted')
{

    $sql4 = "SELECT * FROM notifications,posts,users where notifications.notified_id=posts.post_id   and posts.u_id=users.id and   notifications.status='posted' and notifications.notified_id='".$rows["notified_id"]."'";
$result4 = mysqli_query($con,$sql4);
if (mysqli_num_rows($result4) > 0){
// output data of each row
while($row5 = mysqli_fetch_assoc($result4))
{

if($row5["u_id"] == $_SESSION["id"])
{echo '

    <ul>
    <li><span>
     <a href="post.php?post_id='.$row5['post_id'].'">your post. on '.$row5['date'].'</a></span></li>
        
    </ul>';}
    else if ( (  $row5["u_id"] != $_SESSION["id"])){

echo '

<ul>
<li><span>
 <a href="post.php?post_id='.$row5['name'].'">'.$row5['name'].'.posted on '.$row5['date'].'</a></span></li>
    
</ul>';}


}}
}
else
{
    $sql3 = "SELECT * FROM notifications,comments,users,posts where notifications.notified_id=comments.comment_id  and notifications.status='commented' and notifications.notified_id='".$rows["notified_id"]."' and comments.post_id=posts.post_id and comments.user_id=users.id  ";
    $result3 = mysqli_query($con, $sql3);
    if (mysqli_num_rows($result3) > 0){
    // output data of each row
    while($row4 = mysqli_fetch_assoc($result3))
    {
    $comments=mysqli_num_rows($result3);
    if(($row4["user_id"] == $row4["u_id"]) && ($row4["user_id"] == $_SESSION["id"]))
    {echo '
    
        <ul>
        <li><span>
         <a href="post.php?post_id='.$row4['post_id'].'">you commented your post. of '.$row4['date'].'</a></span></li>
            
        </ul>';}
        else if (($row4["user_id"] != $row4["u_id"])  AND ($_SESSION["id"] == $row4["u_id"])){
    
    echo '
    
    <ul>
    <li><span>
     <a href="post.php?post_id='.$row4['name'].'">'.$row4['name'].'.commented  your.post of '.$row4['date'].'</a></span></li>
        
    </ul>';}
    else if (($row4["user_id"] != $row4["u_id"])  AND ($_SESSION["id"] == $row4["user_id"])){
    
        echo '
        
        <ul>
        <li><span>
         <a href="post.php?post_id='.$row4['name'].'">'.$row4['u_name'].'.commented  your.post of '.$row4['date'].'</a></span></li>
            
        </ul>';}
    
    else
    {
      
    echo '
    
    <ul>
    <li><span>
     <a href="post.php?post_id='.$row4['name'].'">'.$row4['name'].'.commented '.$row4['u_name'].' .post of '.$row3['date'].'</a></span></li>
        
    </ul>';  
    }
    }}
    
}
}
}


?>

</body>
</html>