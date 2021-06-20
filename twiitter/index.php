<?php


//process_data.php

if(isset($_POST["submit"]))
{
    
	$con = mysqli_connect("localhost", "root", "","socialapp");

	

	$name = $_POST["msg"];


	




	

		$query = "INSERT INTO `posts`(post) VALUES('".$name."')";

		$statement = mysqli_query($con,$query);
	
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <title>Twitter Home Page</title>
</head>
<body>
    <div class="container">
        <section id="left__side" class="fixed__side">
            <div class="left__side--top">
                <div class="menu__icon logo">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
                <div class="menu__icon active">
                    <a href="#">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </div>
                <div class="menu__icon">
                    <a href="#">
                        <i class="fas fa-hashtag"></i>
                        Explore
                    </a>
                </div>
                <div class="menu__icon">
                    <a href="#">
                        <i class="far fa-bell"></i>
                        Notifications
                    </a>
                </div>
                <div class="menu__icon">
                    <a href="#">
                        <i class="far fa-envelope"></i>
                        Message
                    </a>
                </div>
                <div class="menu__icon">
                    <a href="#">
                        <i class="far fa-bookmark"></i>
                        Bookmark
                    </a>
                </div>
                <div class="menu__icon">
                    <a href="#">
                        <i class="far fa-list-alt"></i>
                        List
                    </a>
                </div>
                <div class="menu__icon">
                    <a href="#">
                        <i class="far fa-user"></i>
                        Profile
                    </a>
                </div>
                <div class="menu__icon">
                    <a href="#">
                        <i class="fas fa-ellipsis-h"></i>
                        More
                    </a>
                </div>
                <button id="tweet">Tweet</button>
            </div>

            <div class="left__side--bottom">
                <div id="user">
                    <img src="logo.png">
                    <div class="user__info">
                        <h4>Broken Code</h4>
                        <small>@BrokenCodeWeb</small>
                    </div>
                    <i class="fas fa-allipsis-h"></i>
                </div>
            </div>
        </section>

        <section id="center__area">
            <div class="header">
                <h1>Home</h1>
            </div>
            <div class="status">
                <div class="img"></div>
                <form class="happening" method="post" action="index.php">

                    <input type="text" name="msg" placeholder="What's happening">
                    <input type="submit"
                    name="submit" class="tweet__btn">
                     
                </form>
            </div>
            <?php
$sql = "SELECT post FROM posts";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
   echo '<div class="box__img">
   <div class="img"></div>
   <div class="tweet">
       <div class="user__info--tweet">
           <h4>Broken Code</h4>
           <small>@BrokenCodeWeb</small>
       </div>
       <p>'.$row['post'].'</p>
       <img src="food.jpg" class="tweet__img">
   </div>
</div>';
  }
} else {

}

mysqli_close($con);
?>
            <div class="box__img">
                <div class="img"></div>
                <div class="tweet">
                    <div class="user__info--tweet">
                        <h4>Broken Code</h4>
                        <small>@BrokenCodeWeb</small>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus repellendus numquam odio placeat tenetur consectetur suscipit pariatur voluptatem voluptatum distinctio. Laudantium neque rem reiciendis non, nostrum magnam exercitationem, et dolore quasi, tenetur nulla. At et, atque minima nesciunt possimus fuga iste quae cupiditate recusandae tenetur facilis exercitationem aliquid ab deserunt.</p>
                    <img src="food.jpg" class="tweet__img">
                </div>
            </div>
            <div class="box__img">
                <div class="img"></div>
                <div class="tweet">
                    <div class="user__info--tweet">
                        <h4>Broken Code</h4>
                        <small>@BrokenCodeWeb</small>
                    </div>
                    <p>elit. Accusamus repellendus numquam odio placeat tenetur consectetur suscipit pariatur voluptatem voluptatum distinctio. Laudantium neque rem reiciendis non, nostrum magnam exercitationem, et dolore quasi, tenetur nulla. At et, atque minima nesciunt possimus fuga iste quae cupiditate recusandae tenetur facilis exercitationem aliquid ab deserunt.</p>
                    <img src="wings.jpg" class="tweet__img">
                </div>
            </div>
            <div class="box__img">
                <div class="img"></div>
                <div class="tweet">
                    <div class="user__info--tweet">
                        <h4>Broken Code</h4>
                        <small>@BrokenCodeWeb</small>
                    </div>
                    <p>m neque rem reiciendis non, nostrum magnam exercitationem, et dolore quasi, tenetuelit. Accusamus repellendus numquam odio placeat tenetur consectetur suscipit pariatur voluptatem voluptatum distinctio. Laudantium neque rem reiciendis non, nostrum magnam exercitationem, et dolore quasi, tenetur nulla. At et, atque minima nesciunt possimus fuga iste quae cupiditate recusandae tenetur facilis exercitationem aliquid ab deserunt.</p>
                    <img src="radio.jpg" class="tweet__img">
                </div>
            </div>
        </section>

        <section id="right__side" class="fixed__side">
            <form>
                <span class="icon"><i class="fas fa-search"></i></span>
                <input type="text" placeholder="Search Twitter">
            </form>

            <div class="trending">
                <h3>What's happeing</h3>
                <div class="trend">
                    <h5>Lorem ipsum dolor sit amet.</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate neque perferendis dolore?</p>
                </div>
                <div class="trend">
                    <h5>Lorem ipsum dolor sit amet.</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate neque perferendis dolore?</p>
                </div>
                <div class="trend">
                    <h5>Lorem ipsum dolor sit amet.</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate neque perferendis dolore?</p>
                </div>
                <div class="trend">
                    <h5>Lorem ipsum dolor sit amet.</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate neque perferendis dolore?</p>
                </div>
                <button class="show__btn">Show More</button>
            </div>
        </section> 
    </div>
</body>
</html>