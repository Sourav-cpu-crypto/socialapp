<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['id'];
    $searchTerm = $_POST['searchTerm'];

    $sql = "SELECT * FROM posts,users WHERE  posts.u_id=users.id  and (post like '%{$searchTerm}%' or u_name like '%{$searchTerm}%') and users.status!='deactive'";
    $output = "";
    $likes='';
    $comments='';
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
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
        <h4>'.$row["u_name"].'</h4>
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
        
           </div>';
              }
              else
                  
                  {  echo '
           <div class="img"></div>
           <div class="tweet">
               <div class="user__info--tweet">
        <h4>'.$row["name"].'</h4>
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
        ';	  }
    }
}else{
        echo'No user found related to your search term';
    }
    
?>