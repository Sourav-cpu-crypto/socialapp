<?php
require('top.inc.php');




?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Products </h4>
				   <h4 class="box-link"><a href="manage_product.php">Add Product</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Categories</th>
							   <th>Name</th>
							   <th>Image</th>
							   <th>MRP</th>
							   <th>Price</th>
							   <th>Qty</th>
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
							   <td></td>
							   <td>
								
								<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=>Active</a></span>&nbsp
							
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=>Deactive</a></span>&nbsp
								
								<span class='badge badge-edit'><a href='manage_product.php?id=>Edit</a></span>&nbsp
								
								<span class='badge badge-delete'><a href='?type=delete&id=>Delete</a></span>
								
								
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