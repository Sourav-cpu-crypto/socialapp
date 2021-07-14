<?php
require('top.inc.php');


include "../config.php";

?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">POSTS</h4>
				
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>USER id</th>
							   <th>USERNAME</th>
							   <th> about POST</th>
							   
							   
							   <th>IMAGE</th>
							   
							   <th>REPORTED USER ID</th>
							   <th>REPORTED USER NAME</th>

							</tr>
						 </thead>
						 <tbody>
							
						 <?php  $user="select * from posts,reports,users where reports.user_id=users.id and reports.reported_at=posts.post_id  ";
						$p=mysqli_query($con,$user);
						while($row1 = mysqli_fetch_assoc($p))
						{
							if(empty($row1['image']))
							{
						?>
							<tr>
							   <td class="serial"></td>
							   <td><?PHP echo $row1['post_id']?></td>
							   <td>
 <?PHP echo $row1['u_id']?>
 </td>
							   
							   <td><?PHP echo $row1['u_name']?>

						</td>
						<td><?PHP echo $row1['post']?>

</td>


<td><img src=../images/<?php echo  $row1['image'];?>>
							   <td><?PHP echo $row1['user_id']?></td>
							   <td><?PHP echo $row1['name']?></td>



							   
							</tr>
							<?php  } else
							{?>
							
								<tr>
								<td class="serial"></td>
								<td><?PHP echo $row1['post_id']?></td>
								<td>
 <?PHP echo $row1['u_id']?>
 </td>
								<td><?PHP echo $row1['u_name']?>
 
						 </td>
					
 <td><?PHP echo $row1['post']?></td>
 <td><img src=../images/<?php echo  $row1['image'];?>>
 
 </td>
		 <td>
								 
		 <?PHP echo $row1['user_id']?>
									</td>
									<td><?PHP echo $row1['name']?></td>
							 </tr>
						
							<?php } }?>
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