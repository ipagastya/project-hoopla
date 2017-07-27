<?php 
	require('header.php');
	header('Cache-Control: no cache'); //no cache
	session_cache_limiter('private_no_expire'); // works
?>
	<div class="jumbotron">
		<br><br>
		<center><h2 class="leckerli">Inventory List</h2></center>
		<div class="container">
			<!--FILTER AREA-->
			<form class="form-horizontal collapse" id="form-filter" method="post" action="inventory_list"><br>
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
							<option>--All Status--</option>
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
					<button class="greenbutton control-label col-sm-4" type="submit" name="filtersubmit" id="filtersubmit"><center>Submit</center></button>
					<div class="col-sm-4"></div>
				</div>
			</form>
			<div align="right">
				<div class="btn-group" >
					<button class="filterbtn" data-toggle="collapse" data-target="#form-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
					<a href="inventory_create"><button class="addbutton" type="button"><span class="glyphicon glyphicon-plus"></span> Add Inventory</button></a>
				</div>
			</div>
		</div>

	</div>

	<!--============================-->
	<div class="container">
		<h4>Subscription Table</h4>
		<br>
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

					if(isset($_POST['filtersubmit'])){
						$date = $_POST['dateinventory'];
						$status = $_POST['status'];
						if($date != "" && $status != "--All Status--"){
							$query = "SELECT * FROM INVENTORY WHERE return_date = '$date' AND status = '$status'";
						}
						if($date != "" && $status == "--All Status--"){
							$query = "SELECT * FROM INVENTORY WHERE return_date = '$date'";
						}
						if($date == "" && $status != "--All Status--"){
							$query = "SELECT * FROM INVENTORY WHERE status = '$status'";
						}
						if($date == "" && $status == "--All Status--"){
							$query = "SELECT * FROM INVENTORY";
						}

					}
					if(!(isset($_POST['filtersubmit']))){
						$query = "SELECT * FROM INVENTORY";
					}
					$result = mysqli_query($conn,$query);
					if(!$result){
		               	echo("Couldn't execute query");
		                die(mysqli_connect_error());
		            }
					while($row = mysqli_fetch_row($result))
			        {
			        	$queryName1 = "SELECT category_name FROM CATEGORY WHERE category_id = '".$row[7]."'";
			        	$resultName1 = mysqli_query($conn, $queryName1);
			        	$rowName1 = mysqli_fetch_row($resultName1);
			        	$queryName2 = "SELECT category_name FROM CATEGORY WHERE category_id = '".$row[8]."'";
			        	$resultName2 = mysqli_query($conn, $queryName2);
			        	$rowName2 = mysqli_fetch_row($resultName2);
			        	echo "<tr>
			        			<td>".$row[2]."</td>
			        			<td>".$row[1]."</td>
			        			<td>".$row[3]."</td>
			        			<td>".$rowName1[0]."</td>
			        			<td>".$rowName2[0]."</td>
			        			<td>".$row[10]."-".$row[11]."</td>
			        			<td>".$row[4]."</td>
			        			<td>"."<a method='get' href='inventory?id=$row[0]' class='btn btn-default' name='view'>View</a>"."</td>
			        		</tr>";
			        }
				?>
				</tbody>
			</table>
		</div>
		<br><br><br>
	</div>
<br><br><br><br><br><br>
<?php 
	require('footer.php');
?>