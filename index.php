<?php
include "config.php";
session_start();
if(!isset($_SESSION["id"]))
{
header("Location:signlog.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous">

    <link rel="stylesheet" href="s2.css">
    <!-- font awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <title> Home Page</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a href="https://campcodes.com" class="navbar-brand"></a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary"></h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Video Status</button>
		<br /><br />
		<hr style="border-top:3px solid #ccc;"/>
		<?php
			require 'config.php';
			
			$query = mysqli_query($con, "SELECT * FROM `video` ORDER BY `video_id` ASC") or die(mysqli_error());
			while($fetch = mysqli_fetch_array($query)){
		?>
		<div class="col-md-12">
			<div class="col-md-4" style="word-wrap:break-word;">
				<br />
				<h4>Video Name</h4>
				<h5 class="text-primary"><?php echo $fetch['video_name']?></h5>
			</div>
			<div class="col-md-8">
				<video width="100%" height="240" controls>
					<source src="<?php echo $fetch['location']?>">
				</video>
			</div>
			<br style="clear:both;"/>
			<hr style="border-top:1px groovy #000;"/>
		</div>
		<?php
			}
		?>
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<form action="save_video.php" method="POST" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Video File</label>
								<input type="file" name="video" class="form-control-file"/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>

    <div class="container">
        <section id="left__side" class="fixed__side">
            <div class="left__side--top">
                <div class="menu__icon logo">
                    <a phref="#">
                    <?php
                    $p='welcome';
$sql1 = "SELECT * FROM users where id='".$_SESSION["id"]."'";

$result123=mysqli_query($con,$sql1);
if (mysqli_num_rows($result123) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result123)) 
  
  {
    echo$p.'&nbsp'.$row['name'];  
  }
}?>
                    </a>
                </div>
                <div class="menu__icon active">
                    <a href="#">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </div>
             
                <div class="menu__icon">
                    <a href="Chat/users.php">
                        <i class="far fa-envelope"></i>
                        Message
                    </a>
                </div>
                <div class="menu__icon">
                    <a href="friends/index.php">
                        <i class="far fa-envelope"></i>
                        Users
                    </a>
                </div>
                <div class="menu__icon">
                    <a href="profs/index.php?profile=<?php echo $_SESSION['id']; ?>">
                        <i class="far fa-envelope"></i>
                        Profile
                    </a>
                </div>
               
             
                </div>
              
                <div class="menu__icon">
                <?php
                $i=0;
                    $p='welcome';
$sql12 = "SELECT * FROM notified_user where user_id='".$_SESSION["id"]."' and status='active'";

$result1234=mysqli_query($con,$sql12);
if (mysqli_num_rows($result1234) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result1234)) 
  
  {
$i=$i+1;
  }
  echo $i;
}?>
                    <a href="NOTIFICATIONS.php">
                        <i class="far fa-envelope"></i>
                    Notifications
                    </a>
                </div>
                <div class="menu__icon">
                    <a href="account.php">
                        <i class="far fa-envelope"></i>
               Account
                    </a>
                </div>
   <div class="menu__icon">
                    <a href="Chat/php/logout.php?logout_id=<?php echo $_SESSION['id']; ?>">
                        Logout
                    </a>
                </div>
            
                
            </div>

            <div class="left__side--bottom">
                <div id="user">
                
                    
                    <i class="fas fa-allipsis-h"></i>
                </div>
            </div>
        </section>

        <section id="center__area">
            <div class="header">
                <h1>Home</h1>
				
        
            <div class="search">

                <span class="icon"></span>
                <input type="text" class="ser" placeholder="search by post or by username">
                <button class=""><i class="fas fa-search"></i></button>
            </div>

           
       
            </div>
            <div class="status">
                <div class="img"></div>
                <form class="happening" method="post" action="post.php" enctype="multipart/form-data">


                    <input type="text" name="msg" placeholder="write something">

					<input type="file"  name="image1">
                    <button name="submit" value="Post" class="tweet__btn">POst</button>
                     
                </form>

            </div>
          
<div class="box__img">

</div>
	 
      
           
        </section>

    </div>
    <script src="search1.js"></script>
</body>
</html>