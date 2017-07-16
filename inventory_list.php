<?php 
	require('header.php');
?>
<div class="container">
	<form class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2" for="dateinventory">Date :</label>
			<div class="col-sm-3">
				<input type="date" class="form-control" id="dateinventory" name="dateinventory">
			</div>
			<div class="col-sm-7"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="inventorystatus">Inventory Status :</label>
			<div class="col-sm-3">
				<select class="form-control" id="status" name="status">
				    <option>--Select Status--</option>
					<option>Available</option>
					<option>Rented</option>
				    <option>Broken</option>
					<option>Missing Part</option>
				</select>
			</div>
			<div class="col-sm-7"></div>
		</div>
	</form>
	<br>
	<br>
	<div align="right">
		<button class="btn btn-primary addbutton" type="submit"><a href='inventory.php' style='text-decoration: none; color:white;'><span class="glyphicon glyphicon-plus"></span> Add Inventory</a></button>
	</div>
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
	
</div>
<?php 
	require('footer.php');
?>