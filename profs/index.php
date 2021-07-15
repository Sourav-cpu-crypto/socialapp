<?php
session_start();

?><!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
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
	color: #fff;
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

 </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Personal Portfolio Website Design Tutorial</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="custom-padding">
		<nav>
			<div class="logo">
				    SEO WEB
			</div>
			<ul class="menu-area">
				<li>
					<a href="../index.php">Home</a>
				</li>
				<li>
					<a href="../Chat/users.php">MESSAGE</a>
				</li>
                <li>
                    <a href="index.php?profile=<?php echo $_SESSION['id']; ?>">
                        <i class="far fa-envelope"></i>
                        Profile
                    </a>
</li>
				
				<li>
				<a href="../Chat/php/logout.php?logout_id=<?php echo $_SESSION['id']; ?>">
					LOGOUT
				</li>
			</ul>
		</nav>
	</div>
<!-- header section starts  -->

<header>

    <div id="menu-bars" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#friends">friends</a>
        <a href="#imageposts">my image posts</a>
   
    </nav>

</header>

<!-- header section ends -->

<!-- home section starts  -->
<?php
include "../config.php";
if(isset($_GET["profile"])){
 $result1 = mysqli_query($con,"select * from profiles,users where profiles.user_id=users.id and profiles.user_id='".$_GET['profile']."'");
 if (mysqli_num_rows($result1) > 0)
 {
 while($row1 = mysqli_fetch_assoc($result1))
 {

 echo '
<section class="home" id="home">

    <div id="particles-js"></div>

    <div class="content">
      
        
        <p> '.$row1["name"].'<span class="typing-text">anas</span> </p>
        <a href="#about" class="btn">about me</a>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> about <span>me</span> </h1>

    <div class="row">

        <div class="image">
            <img class="tilt" src="images/'.$row1["photo"].'" alt="">
        </div>

        <div class="content">
            <h3> my name is <span>'.$row1["name"].' </span> </h3>
            <p class="info">'.$row1["about"].'</p>
            <div class="box-container">
                <div class="box">
                    <p> <span> age: </span> '.$row1["age"].' </p>
                    <p> <span> gender: </span> '.$row1["gender"].' </p>
               
                </div>
                <div class="box">
                  
                    <p> <span> phone : </span> '.$row1["mob"].'  </p>
                    <p> <span> email : </span> '.$row1["email"].' </p>
                
                </div>
            </div>
         
        </div>

    </div>

</section>
';}

}else
{
    $result1 = mysqli_query($con,"select * from users where id='".$_GET["profile"]."'");
 if (mysqli_num_rows($result1) > 0)
 {
 while($row1 = mysqli_fetch_assoc($result1))
 {
    echo '
<section class="home" id="home">

    <div id="particles-js"></div>

    <div class="content">
        <img class="tilt" src="" alt="">
        
        <p> '.$row1["name"].'&nbsp<span class="typing-text"></span> </p>
        <a href="#about" class="btn">about me</a>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> about <span>me</span> </h1>

    <div class="row">

        <div class="image">
            <img class="tilt" src="images/about-pic.jpg" alt="">
        </div>

        <div class="content">
            <h3> my name is <span> '.$row1["name"].' </span> </h3>
            <p class="info"></p>
            <div class="box-container">
                <div class="box">
                    <p> <span> age: </span>  </p>
                    <p> <span> gender: </span>  </p>
               
                </div>
                <div class="box">
                  
                    <p> <span> phone : </span>  </p>
                    <p> <span> email : </span> </p>
                
                </div>
            </div>
            <a href="#" class="btn"></a>
        </div>

    </div>

</section>
'; }}
}}

?>
<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="friends">

    <h1 class="heading"> <span> my </span>friends </h1>

    <div class="box-container">
<?php
if(isset($_GET["profile"])){
 $result1 = mysqli_query($con,"SELECT * FROM `friends`,`users` where (users.id=friends.user_to or users.id=friends.user_from) AND users.id='".$_GET['profile']."' and friends.status='friends'");
 if (mysqli_num_rows($result1) > 0)
 {
 while($row1 = mysqli_fetch_assoc($result1))
 {
    if(($row1["user_to"] ==$_SESSION["id"])  OR ($row1["user_from"] ==$_SESSION["id"]))
    {
        if(($row1["user_from"]==$_SESSION["id"]))
        {
            $result2 = mysqli_query($con,"SELECT * FROM `users` where users.id='".$row1['user_to']."'");
            if (mysqli_num_rows($result2) > 0)
            {
            while($row2 = mysqli_fetch_assoc($result2))
            {
        echo'
        <div class="box tilt">
            <i class="fas fa-code"></i>
            <h3>'.$row2['name'].'</h3>
            
        </div>

     
        
    
';} }}
else
{
    $result2 = mysqli_query($con,"SELECT * FROM `users` where users.id='".$row1['user_from']."'");
    if (mysqli_num_rows($result2) > 0)
    {
    while($row2 = mysqli_fetch_assoc($result2))
    {
echo'
<div class="box tilt">
    <i class="fas fa-code"></i>
    <h3>'.$row2['name'].'</h3>
    
</div>




';} }   
}
    }}}}
?>
      
    </div>

</section>

<!-- services section ends -->

<!-- portfolio section starts  -->

<section class="portfolio" id="imageposts">

    <h1 class="heading"> <span> my </span> posts </h1>

    <div class="box-container">
   <?php $result4= mysqli_query($con,"SELECT * FROM `posts`,`users` where posts.u_id=users.id and   posts.u_id='".$_GET['profile']."' and posts.image!=''");
 if (mysqli_num_rows($result4) > 0)
 {
 while($row1 = mysqli_fetch_assoc($result4))
 {
      echo'  <div class="box tilt">
            <img src="../images/'.$row1['image'].'" alt="">
            <div class="content">
                <a href="#" class="btn">learn more</a>
            </div>
        </div>';
 }
}?>
        

    </div>
    
</section>

<!-- portfolio section ends -->

<!-- blogs section starts  -->


<!-- blogs section ends -->

<!-- contact section starts  -->
<?php
        if($_GET["profile"]==$_SESSION["id"]  )
        {
        echo'
<section class="contact" id="contact">

    <h1 class="heading"> <a href="edit.php">EDIT  <span> YOUR PROFILE </span></a> </h1>

 

    </div>

</section>
';
        }
?>
<!-- contact section ends -->

<!-- footer section  -->
















<!-- javascript part  -->

<!-- typed.js link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script>

<!-- particles.js links  -->
<script src="js/particles.min.js"></script>
<script src="js/app.js"></script>

<!-- vanilla-tilt.js link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>

<script>

let menu = document.querySelector('#menu-bars');
let header = document.querySelector('header');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    header.classList.toggle('active');
}

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    header.classList.remove('active');
};

var typed = new Typed('.typing-text', {
    
    loop : true,
    typeSpeed : 150
});

VanillaTilt.init(document.querySelectorAll('.tilt'),{
    max:25
});

</script>

</body>
</html>