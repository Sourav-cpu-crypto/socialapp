<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['id'])){
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Realtime Chat App | CodingNepal</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
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
</head>

<body>
<div class="custom-padding">
		<nav>
			<div class="logo">
				Logo
			</div>
			<ul class="menu-area">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="Chat/users.php">MESSAGE</a>
				</li>
				<li>
					<a href="profiles/prof.php">Profile</a>
				</li>
				<li>
					<a href="videochat/vides.php">Video Chat</a>
				</li>
				<li>
				<a href="../Chat/php/logout.php?logout_id=<?php echo $_SESSION['id']; ?>">
					LOGOUT
				</li>
			</ul>
		</nav>
	</div>
  <div class="wrapper">
    <section class="chat-area">
      <header>
    
        <a href="index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        
       
      </header>
      <div class="chat-box">
      <?php 
    
    if(isset($_SESSION['id'])){
        
        $outgoing_id = $_SESSION['id'];
        
        $output = "";
		$now="you";
        $sql = "SELECT * FROM comments,users where post_id='".$_GET['post_id']."' and comments.user_id=users.id and (status!='deactive' or status!='delete') ";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
              
                    echo '<div class="chat outgoing">
                                <div class="details">
								
								  <h1>'. $row['name'] .'</h1>
                                    <p>'. $row['comment'] .'</p>
                                </div>
                                </div>';
               
            }
        }else{
            echo '<div class="text">No comments are available</div>';
        }
        echo $output;
    }else{
        header("location: ../signlog.php");
    }

?>
      </div>
      <form  class="typing-area"  method="post" action="comment1.php">
        <input type="text" class="incoming_id" name="uid" value="<?php echo $_SESSION['id']; ?>" hidden>
        <input type="text" class="incoming_id" name="pid" value="<?php echo $_GET['post_id']; ?>" hidden>
        <input type="text" name="comment" class="input-field" placeholder="comment..." autocomplete="off">
        <input type="submit" name="submit" value="comment">
      </form>
    </section>
  </div>

  

</body>
</html>
