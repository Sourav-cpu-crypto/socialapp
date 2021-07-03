﻿<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "socialapp"); 
$email=$_SESSION['email']; 

$query = "select * from users where email='".$email."' ";

    $res = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($res);
    $name = $row['filename'];


      if(isset($_POST["mypara"]))
      {
        $query = "INSERT INTO posts(post) 
        VALUES('".$_POST["mypara"]."')";
        
                $statement = $connect->prepare($query);
        
                $statement->execute($data);
      }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Homaj Home</title>
	<!-- CSS and JavaScript references -->
	<link rel="stylesheet" type="text/css" href="../CSS/header.css">
	<link rel="stylesheet" type="text/css" href="../CSS/home.css">
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome/css/font-awesome.min.css">
	<script src="../javascript/header.js"></script>
	<script src="../javascript/home.js"></script>
	<!-- Ending of CSS and JavaScrit -->

</head>
<body onload="newpost();">
	<!-- Header section -->
	<div class="headerfixed">
		<!-- Header start -->
	<div class="header">
		<!-- Wrapper start of heading-->
		<div class="wrapper">
			<!-- homaj logo -->
			<a href="home.html"><img src="../images/<?php  echo $name; ?>" width=60 height=45 class="logoletter"/></a>
			<!-- Search bar -->
			<form id="searching">
			  <input type="text" name="search" placeholder="Search.." id="search">
			</form>

			<!-- icon bar to navigate to all pages -->
			<div class="icon-bar">
			 <ul>
			 	<!-- home -->
			 	<li style="border-bottom: 6px solid white;"><a href="home.html" onmouseover="headerchange(1);" onmouseout="headerorigin(1);"><img src="../images/login/home.png" id="homaj-home"><p id="p1">Home</p></a></li>
			 	<!-- profile -->
			 	<li> <a href="profile.html" onmouseover="headerchange(2);" onmouseout="headerorigin(2);"><img src="../images/login/profile.png" id="homaj-profile"><p id="p2">Profile</p></a> </li>
			 	<!-- society -->
			 	<li><a href="society.html" onmouseover="headerchange(3);" onmouseout="headerorigin(3);"><img src="../images/login/society.png" id="homaj-society"><p id="p3">Society</p></a></li>
			 	<!-- message -->
			 	<li> <a href="messages.html" onmouseover="headerchange(4);" onmouseout="headerorigin(4);"><img src="../images/login/message.png" id="homaj-message"><p id="p4">Messages</p></a></li>
			 	<!-- notification -->
			 	<li><a href="#" onmouseover="headerchange(5);" onmouseout="headerorigin(5);"><img src="../images/login/notification.png" id="homaj-notification">
                               <p id="p5">Notifications</p></a>
			 	<div id="notify">
			 		<p>No New Notification</p>
			 		<hr style="background-color:white;width: 90%;">
			 	</div>
			 	</li>
			 </ul>	 
			   
			</div>
			<!-- Ending of Icon bar -->


		</div>
		<!-- Wrapper End of heading -->

	</div>
	<!-- End of header -->
	</div>
	<!-- End of header section -->


	<!-- Content Section -->
	<div class="content">
		<!-- Start wrapper -e>
		<div class="wrapper">

			<!-- Start Left section -->
			<div class="leftfixed">
				<!-- start sidebar left -->
				<div class="sidebarleft">
					<img src="../images/profile/upload.png"/>
					<p id="sidename"> Rajkumar Rocktim Narayan Singha</p>
					<p id="ssn"> Jorhat Institute of Science and Techonology</p>
					<p id="country">India</p>
					<a href="profile.html" id="viewall">View All</a>
					<hr>
					<p id="nosociety">31</p>
					<p id="societyname"><a href="society.html">Society</a></p>
					<p id="logout"><a href="../index.html">Log Out</a></p>
				</div>
				<!-- End of sidebar left -->
			</div>
			<!-- End of leftfixed -->

			<!-- start of main content section -->
			<div class="mainnotfixed" id="mainnotfixed">
				<!-- Start of post an content -->
				<form class="main mainpost" action="#" style="margin-bottom:20px; padding-bottom:10px;">	

					<div class="userimg"><img src="../images/profile/upload.png"/>
						</div>
					    <div class="username">				 <p class="name" style="top:15px;">Rajkumar Rocktim Narayan Singha</p>
					    </div>
						<p class="quotes">
							<textarea id="mypara" name="mypara" placeholder="Share an article ,photo ,video or idea."></textarea>
						</p>
						<!-- image load to post -->
						<div class="post">
							<img id="load2" class="postimg" src=" "/>
						</div>

						<div class="postbar">
							<input type="file" accept="images/*" id="chooseimg" onchange="loadFile(event)" onmouseover="onbuttoncolor()" onmouseout="outbuttoncolor()"/>
							<button type="button" class="imgbttn" id="imgbttn">&#x1f4f7; Images</button>
							<input type="submit" id="postmypost" class="postmypost" onclick="mypost();">
						</div>

				</form>
				<!-- End of post an content -->
				<hr>

				<!-- posted content view -->
				<div class="allpost">
					<!-- post 1 by creator-->
					
					    <div class="username">				 
					    </div>
						
						
						
					

					</div>
					<!-- end of post 1 by creator -->

					<!-- post 2 by creator -->
					<div class="mainpost">
						<div class="userimg"><img src="../images/homaj logo.png"/>
						</div>
					    <div class="username">				 
<p class="name">homaj group</p>
					    </div>
						<p class="time">8min ago</p>
						<p class="quotes">
							A gender-equal society would be one where the word 'gender' does not exist: where everyone can be themselves.
						</p>
						<div class="post">
							<img class="postimg" src="../images/login/society.jpg"/>
						</div>

						<div class="likedislike">
							<p class="like">
								<span class="nooflike" id="like2">0 </span> likes &nbsp <span class="noofdislike" id="dislike2">0 </span> dislikes
							</p>
							<p class="likedisbttn">
								<span id="thumbsup2" class="fa fa-thumbs-up" onclick="increase('like2','dislike2','thumbsup2','thumbsdown2');"></span> <span id="thumbsdown2" class="fa fa-thumbs-down" onclick="decrease('like2','dislike2','thumbsup2','thumbsdown2');"></span>
							</p>
						</div>

					</div>
					<!-- end of post 2 by creator -->


				</div>
				<!-- end of posted content view -->

				<!-- button to view more previous post -->
				<button type="button" id="viewmore" class="viewmore" onclick="newpost();">View More</button>
			</div>
			<!-- End of main content section -->

			<!-- start of right section suggestion user -->
			<div class="rightfixed">
				

				<!-- Start of right fixed -->
				
				<!-- End of right fixed -->

			</div>
			<!-- End of right section suggestion user -->


			<!-- Start of about homaj -->
			<div class="rightfixed">
				
				<div class="sidebarright" style="width: 280px;padding: 4px;margin-top: 20px;height: 150px;">
					<hr style="top: -25px;">
				<div class="foot">

					<ul>
						<li><a href="">About</a></li>
						<li><a href="">Contact</a></li>
						<li><a href="">Privacy and Policy</a></li>
						<li><a href="">Help</a></li>
					</ul>
					<img src="../images/homaj logo.png"/>
					<p>Copyright © www.homaj.com 2017 All Rights Reserved.</p>
				</div>
				</div>
			</div>
			<!-- End of about homaj -->

			<!-- message bar at the bottom -->
			<div class="message" id="msg1">
				<button id="msg2" onclick="showhide()">Messaging</button>
				<p> No New Messages.</p>
			</div>
			<!-- End of message bar at the bottom -->

		</div>
		<!-- End of wrapper -->

	</div>
	<!-- End of content section -->


</body>
</html>