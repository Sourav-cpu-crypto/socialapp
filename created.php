<?php
	$con=mysqli_connect("localhost","root","","socialapp");
session_start();
if(!isset($_SESSION["id"]))
{
header('Location:../signlog.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
<link rel="stylesheet" type="text/css" href="groups/style.css">
<style type="text/css">
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


</style>
</head>
<body>


	<div class="msg">
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
					<a href="../Chat/users.php">MESSAGE</a>
				</li>
				<li>
					<a href="../profiles/prof.php">Profile</a>
				</li>
				<li>
					<a href="../videochat/vides.php">Video Chat</a>
				</li>
				<li>
				<a href="../Chat/php/logout.php?logout_id=<?php echo $_SESSION['id']; ?>">
					LOGOUT
				</li>
			</ul>
		</nav>
	</div>
	</div>
<table>
	<thead>
		<tr>
			<th>GROUP_Name</th>
	
			<th colspan="4">USERROLE STATUS</th>
		</tr>
	</thead>
	<?php
		$id=$_SESSION["id"];

$p='s2';
	$sql12 = "SELECT * FROM groups,users where group_id='".$_GET["group_id"]."' and groups.group_creator_id=users.id and (status!='deactive' or status!='delete') ";
    $result2 = mysqli_query($con, $sql12);
if (mysqli_num_rows($result2) > 0){
    
  // output data of each row
  while($row2 = mysqli_fetch_assoc($result2))
{
    $g_c_id=$row2["group_creator_id"];
    $g_c_id1=$row2["group_id"];

	$g_n=$row2["group_name"];
	if($g_c_id ==($id) )
    {
        $admin='admin';
	
	echo'

		<tr>
			<td>'.$g_n.'</td>
		
		
			<td>
				<a href="index2.php?group_id='.$g_c_id1.'" class="del_btn">'.$admin.'&nbspGROUP ACTIVE</a>
			</td>
			
		</tr>';

    }

        $sql123 = "SELECT * FROM groups_members_active where  (group_id='".$g_c_id1."' or group_requester_id='".$_SESSION["id"]."')  AND (status='active' OR status='requested')";
        $result23 = mysqli_query($con, $sql123);
        if (mysqli_num_rows($result23) > 0){
            
        // output data of each row
        while($row3 = mysqli_fetch_assoc($result23))
        {
			
        
            if($row3['status']=='requested' AND $g_c_id==$_SESSION["id"])
            {
                echo'
        
                <tr>
                    <td>'.$g_n.'</td>
                
                
                    <td>"
                        <a href="groups/joined.php?update='.$g_c_id1.'&user='.$row3["group_requester_id"].'" class="del_btn">'.$row3['group_requester_name'].'accept group request</a>
                    </td>
                    
                </tr>';  
            }
            else if($row3['status']=='active'){
            echo'
        
                <tr>
                    <td>'.$g_n.'</td>
                
                
                    <td>
                        <a href="index2.php?group_id='.$g_c_id1.'"" class="del_btn">'.$row3['group_requester_name'].''.$row3['status'].'</a>
                    </td>
                    
                </tr>';
            } 

            else if($row3['status']=='requested' AND $row3["group_requester_id"]==$_SESSION["id"])
            {
				echo'
        
                <tr>
                    <td>'.$g_n.'</td>
                
                
                    <td>"
                        <a href="groups/joined.php?update='.$g_c_id1.'&user='.$row3["group_requester_id"].'" class="del_btn">'.$row3['group_requester_name'].'accept group request</a>
                    </td>
                    
                </tr>'; 
            }
               
            }
        }     
        
        
    
      
        else
        {

       
            $sql123 = "SELECT * FROM users  where id='".$_SESSION["id"]."'  ";
            $result23 = mysqli_query($con, $sql123);
            
            if (mysqli_num_rows($result23) > 0){
          
            // output data of each row
            while($row3 = mysqli_fetch_assoc($result23))
            {
            
            
                
                echo'
            
                    <tr>
                        <td>'.$g_n.'</td>
                    
                    
                        <td>
                            <a href="groups/joined.php?join='.$g_c_id1.'" class="del_btn">JOIN NOW</a>
                        </td>
                        
                    </tr>';
            
            
            }
           
        }
    
    }


}
}



		?>
	</table>

</body>
</html>