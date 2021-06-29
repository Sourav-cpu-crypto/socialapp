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
</head>
<body>
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
        $sql = "SELECT * FROM comments,users where post_id='".$_GET['post_id']."' and comments.user_id=users.id ";
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

  <script src="javascript/chat.js"></script>

</body>
</html>
