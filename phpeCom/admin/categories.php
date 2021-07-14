<?php
require('top.inc.php');





?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Categories </h4>
				   <h4 class="box-link"><a href="manage_categories.php">Add Categories</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Categories</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							
					
							<tr>
							   <td class="serial"></td>
							   <td></td>
							   <td></td>
							   <td>
								
									<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=>Active</a></span>&nbsp
								
									<span class='badge badge-pending'><a href='?type=status&operation=active&id=>Deactive</a></span>&nbsp;";
							
								<span class='badge badge-edit'><a href='manage_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp
								
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