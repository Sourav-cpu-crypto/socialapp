<html>
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

</head>
<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['id'])){
    header("location:../signlog.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
<div class="custom-padding">
		<nav>
			<div class="logo">
				Logo
			</div>
			<ul class="menu-area">
				<li>
					<a href="../index.php">Home</a>
				</li>
				<li>
					<a href="../Chat/users.php">MESSAGE</a>
				</li>
				<li>
					<a href="../profiles/prof.php">Profile</a>
				</li>
			
				<li>
				<a href="Chat/php/logout.php?logout_id=<?php echo $_SESSION['id']; ?>">
					LOGOUT
				</li>
			</ul>
		</nav>
	</div>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE id = {$_SESSION['id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          
          <div class="details">
            <span><?php echo $row['name']. " "  ?></span>
      
            <p><?php echo $row['status']; ?></p>
            <p></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
