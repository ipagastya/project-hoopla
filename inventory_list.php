<?php 
	require('header.php');
?>
<div class="container">
	<center><h3>Inventory List</h3></center>
	<br>
	<div class="filterbox"><button class="addbutton" data-toggle="collapse" data-target="#form-filter"><span class="glyphicon glyphicon-filter"></span> Filter Subscription Table</button></div>
	<form class="form-horizontal collapse" id="form-filter">
		<br>
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
					<option>Available</option>
					<option>Rented</option>
				    <option>Broken</option>
					<option>Missing Part</option>
				</select>
			</div>
			<div class="col-sm-7"></div>
		</div>
		<br>
		<div class="form-group">
			<div class="col-sm-4"></div>
			<button class="greenbutton control-label col-sm-4" type="submit"><center>Submit</center></button>
			<div class="col-sm-4"></div>
		</div>
	</form>
	<br>
	<div align="right">
		<a href="inventory_create.php"><button class="addbutton" type="button"><span class="glyphicon glyphicon-plus"></span> Add Inventory</button></a>
	</div>
	<br>
	<h4>Subscription Table</h4>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
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
			</thead>
			<tbody>
			<?php
				include "config.php";
				$query = "SELECT * FROM INVENTORY";
				$result = mysqli_query($conn,$query);
				if(!$result){
	               	echo("Couldn't execute query");
	                die(mysqli_connect_error());
	            }
	            $header=false;
				while($row = mysqli_fetch_row($result))
		        {
		        	$queryName1 = "SELECT category_name FROM CATEGORY WHERE category_id = '".$row[6]."'";
		        	$resultName1 = mysqli_query($conn, $queryName1);
		        	$rowName1 = mysqli_fetch_row($resultName1);
		        	$queryName2 = "SELECT category_name FROM CATEGORY WHERE category_id = '".$row[7]."'";
		        	$resultName2 = mysqli_query($conn, $queryName2);
		        	$rowName2 = mysqli_fetch_row($resultName2);
		        	echo "<tr>
		        			<td>".$row[1]."</td>
		        			<td>".$row[0]."</td>
		        			<td>".$row[2]."</td>
		        			<td>".$rowName1[0]."</td>
		        			<td>".$rowName2[0]."</td>
		        			<td>".$row[9]."-".$row[10]."</td>
		        			<td>".$row[3]."</td>
		        			<td>"."<a method='post' href='inventory.php?productcode=$row[0]' class='btn btn-default' name='view'>View</a>"."</td>
		        		</tr>";
		        }
			?>
			</tbody>
		</table>
	</div>
	<br>
	<br>
	<br>
	
</div>
<?php 
	require('footer.php');
?>