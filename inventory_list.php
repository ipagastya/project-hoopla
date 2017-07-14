<?php 
	require('header.php');
?>
<div class="container">
	<form class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliveryID">Date :</label>
			<div class="col-sm-3">
				<input type="date" class="form-control" id="deliveryID" name="deliveryID">
			</div>
			<div class="col-sm-7"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliveryID">Inventory Status :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="deliveryID" name="deliveryID">
			</div>
			<div class="col-sm-7"></div>
		</div>
	</form>
	<br>
	<br>
	<br>
	<h4>Subscription Table</h4>
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Toy Name</th>
				<th>Product Code</th>
				<th>Manufacturer</th>
				<th>Toy Category 1</th>
				<th>Toy Category 2</th>
				<th>Hoopla Age</th>
				<th>Status</th>
				<th>Details</th>
			</tr>
			<?php
				// loop untuk isi db
			?>
		</table>
	</div>
	<br>
	<br>
	<br>
	<div align="right">
		<button class="btn btn-primary addbutton" type="submit"><a href='customer.php' style='text-decoration: none; color:white;'><span class="glyphicon glyphicon-plus"></span> Add Inventory</a></button>
	</div>
</div>
<?php 
	require('footer.php');
?>