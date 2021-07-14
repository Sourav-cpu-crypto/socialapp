<?php
session_start();
include "config.php";

if(!isset($_SESSION["id"]))
{
header("Location:signlog.php");
}

$sql12 = "SELECT * FROM groups where group_id='".$_GET["group_id"]."' ";
    $result2 = mysqli_query($con, $sql12);
if (mysqli_num_rows($result2) > 0){
    
  // output data of each row
  while($row2 = mysqli_fetch_assoc($result2))
{
    $g_c_id=$row2["group_creator_id"];
    $g_c_id1=$row2["group_id"];

	$g_n=$row2["group_name"];


        $sql123 = "SELECT * FROM groups_members_active where  (group_id='".$g_c_id1."' OR group_requester_id='".$_SESSION["id"]."')  AND (status='active' OR status='requested')";
        $result23 = mysqli_query($con, $sql123);
        if (mysqli_num_rows($result23) > 0){
                  
        
while($row3 = mysqli_fetch_assoc($result23))
{
        // output data of each row
       
}
    }   
} 
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
                    <a href="profiles/prof.php?profile=<?php echo $_SESSION['id']; ?>">
                        <i class="far fa-envelope"></i>
                        Profile
                    </a>
                </div>
               
                <div class="menu__icon">
                    <a href="GROUPS/index.php">
                        <i class="far fa-envelope"></i>
                        GROUP
                    </a>
                </div>
                <div class="menu__icon">
                    <?php
                    echo'
                <a href="created.php?group_id='.$_GET["group_id"].'" class="del_btn">
                <i class="far fa-envelope"></i>
                        created group
                    </a>';
                      ?>
                </div>
                <div class="menu__icon">
                    <a href="NOTIFICATIONS.php">
                        <i class="far fa-envelope"></i>
                    Notifications
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
                <form class="happening" method="post" action="post1.php" enctype="multipart/form-data">
                   <input type="text"  name="group" value="<?php echo $_GET["group_id"] ?>">

                    <input type="text" name="msg" placeholder="write something">

					<input type="file"  name="image1">
                    <button name="submit" value="Post" class="tweet__btn">POst</button>
                     
                </form>

            </div>
          
<div class="box__img">
<?php

			
$sql = "SELECT * FROM group_action,posts,users where group_action.post_id=posts.post_id and posts.u_id=users.id ";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    $name=$row["name"];
$likes='';
$comments='';

 $sql1 = "SELECT * FROM likes where post_id='". $row['post_id'] ."'";
    $result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) > 0){
  // output data of each row
  while($row1 = mysqli_fetch_assoc($result1))
{
$likes=mysqli_num_rows($result1);

}
}

$sql2 = "SELECT * FROM comments where post_id='". $row['post_id'] ."'";
$result2 = mysqli_query($con, $sql2);
if (mysqli_num_rows($result2) > 0){
// output data of each row
while($row3 = mysqli_fetch_assoc($result2))
{
$comments=mysqli_num_rows($result2);

}
}
 if(!empty($row['image']))
	  {
   echo '
   <div class="img"></div>
   <div class="tweet">
   <a href="reports.php?post_id='.$row['post_id'].'">Report</a>
       <div class="user__info--tweet">
       <a href="profiles/prof.php?profile='.$row['u_id'].'">
<h4>'.$name.'</h4></a>
<br>
           
       </div>
           <br>
           <br>
           <h4>posted on:'.$row['date'].'</h4>
 

       <p>'.$row['post'].'</p>
       <img src="images/'.$row['image'].'" class="tweet__img" >
	   <a href="like.php?post_id='.$row['post_id'].'" class="li">Like</a>
       <span>'.$likes.'</span>
       &nbsp
       <a href="comments.php?post_id='.$row['post_id'].'">Comment</a>
       <span>'.$comments.'</span>
       &nbsp
       <a href="reports.php?post_id='.$row['post_id'].'">Report</a>
       

   </div>';
	  }
	  else
		  
		  {  echo '<div class="box__img">
   <div class="img"></div>
   <div class="tweet">
   <a href="profiles/prof.php?profile='.$row['u_id'].'">
   <h4>'.$name.'</h4></a>
<br>
           
       </div>
           <br>
           <br>
           <h4>posted on:'.$row['date'].'</h4>
 

       <p>'.$row['post'].'</p>
      
       <a href="like.php?post_id='.$row['post_id'].'" class="li">Like</a>
       <span>'.$likes.'</span>
       &nbsp
       <a href="comments.php?post_id='.$row['post_id'].'">Comment</a>
       <span>'.$comments.'</span>

   </div>
</div>';	  }
        }
} else {

}


?>
</div>
	 
      
           
        </section>

    </div>
    
</body>
</html>