<?php
require('top.inc.php');


?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Contact Us </h4>
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
							   <th>Query</th>
							   <th>Date</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							
							<tr>
							   <td class="serial"></td>
							   <td></td>
							   <td></td>
							   <td></td>
							   <td></td>
							   <td></td>
							   <td></td>
							   <td>
								
							<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>
							
							   </td>
							</tr>
							
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