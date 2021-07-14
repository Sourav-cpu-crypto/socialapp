<?php
include "../config.php";
if( isset($_GET['delete']))
{
$sql2= "delete  from users where id='".$_GET['user']."'";
mysqli_query($con,$sql2);
$sql3= "delete  from posts where u_id='".$_GET['user']."'";
mysqli_query($con,$sql3);
$sql4= "delete  from comments where user_id='".$_GET['user']."'";

mysqli_query($con,$sql4);
$sql5= "delete  from likes  where user_id='".$_GET['user']."'";
mysqli_query($con,$sql5);
$sql6= "delete from reports where user_id='".$_GET['user']."'";
mysqli_query($con,$sql6);
$sql7= "delete  from profiles where user_id='".$_GET['user']."'";
mysqli_query($con,$sql7);
$sql8= "delete  from messages where (incoming_msg_id='".$_GET['user']."' or outgoing_msg_id='".$_GET['user']."')";
mysqli_query($con,$sql8);
$sql9= "delete  from groups where (group_creator_id='".$_GET['user']."')";
mysqli_query($con,$sql9);
$sql10= "delete  from group_member_active where (group_requester_id='".$_GET['user']."')";
mysqli_query($con,$sql10);
$sql11= "delete  from friends where (user_to='".$_GET['user']."' or user_from='".$_GET['user']."')";
mysqli_query($con,$sql11);

$sql12= "delete  from notified_user where (user_id='".$_GET['user']."')";
mysqli_query($con,$sql12);


}
require('top.inc.php');
include "../config.php";
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Users </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Name</th>
							   <th>Email</th>
							   <th>Mobile</th>
							   <th>age</th>
							   <th>gender</th>
							   <th>status</th>
							   
							</tr>
						 </thead>
						 <tbody>
						<?php  $user="select * from users,profiles where users.id=profiles.user_id";
						$p=mysqli_query($con,$user);
						while($row1 = mysqli_fetch_assoc($p))
						{
							if($row1['status']=='delete')
							{
								echo '
							<tr>
							   <td class="serial"></td>
							   <td> ' .$row1['id'].'</td>
							   <td> '.$row1['name'].'</td>
							   <td> '.$row1['email'].'</td>
							   <td> '.$row1['mob'].'</td>
							   <td>'.$row1['age'].'</td>
							   <td> '.$row1['gender'].'</td>
							
							   </td>
							   <td><a href=users.php?delete='.$row1['status'].'&user='.$row1['id'].'>  '.$row1['status'].'</a></td>
							
							   </td>
							</tr>
							';
							}
							else
							{
						echo '
							<tr>
							   <td class="serial"></td>
							   <td> ' .$row1['id'].'</td>
							   <td> '.$row1['name'].'</td>
							   <td> '.$row1['email'].'</td>
							   <td> '.$row1['mob'].'</td>
							   <td>'.$row1['age'].'</td>
							   <td> '.$row1['gender'].'</td>
							
							   </td>
							   <td>'.$row1['status'].'</td>
							
							   </td>
							</tr>
							'; }}?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>