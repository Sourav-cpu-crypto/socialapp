<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="s1.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <title>Twitter Home Page</title>
</head>
<body>
    <div class="container">
        <section id="left__side" class="fixed__side">
            <div class="left__side--top">
                <div class="menu__icon logo">
                    <a phref="#">
                        
                    </a>
                </div>
                <div class="menu__icon active">
                    <a href="#">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </div>
             
                <div class="menu__icon">
                    <a href="msg.php">
                        <i class="far fa-envelope"></i>
                        Message
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
				
        
            <form>
                <span class="icon"><i class="fas fa-search"></i></span>
                <input type="text" placeholder="">
            </form>

           
       
            </div>
            <div class="status">
                <div class="img"></div>
                <form class="happening" method="post" action="post.php" enctype="multipart/form-data">

                    <input type="text" name="msg" placeholder="write something">
					<input type="file"  name="image1">
                    <input type="submit"name="submit" value="Post" class="tweet__btn">
                     
                </form>

            </div>
            <?php
			$con=mysqli_connect("localhost","root","","socialapp");
$sql = "SELECT * FROM posts";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $sql1 = "SELECT * FROM users where id='" . $row['user_id']. "'";
    $result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) > 0){
  // output data of each row
  while($row = mysqli_fetch_assoc($result1))
{$name=$row['name'];
	  if(!empty($row['image']))
	  {
   echo '<div class="box__img">
   <div class="img"></div>
   <div class="tweet">
       <div class="user__info--tweet">
           <h4>posted on:</h4>
           <h4>'.$row['date'].'</h4>
       </div>
           <br>
           <br>
           <h4>posted by:</h4>
           <h4>'.'$name'.'</h4>
       <p>'.$row['post'].'</p>
       <img src="images/'.$row['image'].'" class="tweet__img" >
	   

   </div>
</div>';
	  }
	  else
		  
		  {
			    echo '<div class="box__img">
   <div class="img"></div>
   <div class="tweet">
       <div class="user__info--tweet">
               <h4>posted on:</h4>
           <h4>'.$row['date'].'</h4>
       </div>
       <p>'.$row['post'].'</p>
       
   </div>
</div>'; 
		  }
        }
} else {

}

mysqli_close($con);
?>
          
          
           
        </section>

    </div>
</body>
</html>