<?php
session_start();
			$con=mysqli_connect("localhost","root","","socialapp");
$sql = "SELECT * FROM users,posts where (posts.u_id=users.id )  and (status!='deactive') "; 
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
       <div class="user__info--tweet">
       <a href="profs/index.php?profile='.$row['u_id'].'">
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
    <a href="profs/index.php?profile='.$row['u_id'].'">
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