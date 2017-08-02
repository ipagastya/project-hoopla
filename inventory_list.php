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
			<form class="form-horizontal collapse" id="form-filter" method="get" action="inventory_list"><br>
				<input type="hidden" name="page" value="1" /> 
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
					if(isset($_GET['filtersubmit'])){
						$date = $_GET['dateinventory'];
						$status = $_GET['status'];
						$today = date("Y-m-d");
						if($date != "" && $status != "--All Status--"){
							$query = "SELECT * FROM INVENTORY WHERE 
									return_date >= '$today' AND return_date <= '$date' AND status LIKE '%$status%'";
						}
						if($date != "" && $status == "--All Status--"){
							$query = "SELECT * FROM INVENTORY WHERE return_date >= '$today' AND return_date <= '$date'";
						}
						if($date == "" && $status != "--All Status--"){
							$query = "SELECT * FROM INVENTORY WHERE status LIKE '%$status%'";
						}
						if($date == "" && $status == "--All Status--"){
							$query = "SELECT * FROM INVENTORY";
						}
					}
					else{
						$query = "SELECT * FROM INVENTORY";
					}
					$offset = ($_GET['page'] - 1) * 10;
					$result = mysqli_query($conn,"$query LIMIT 10 OFFSET $offset");
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
			        			<td>"."<a method='get' href='inventory?page=1&id=$row[0]' class='btn btn-default' name='view'>View</a>"."</td>
			        		</tr>";
			        }
			        $resultFull = mysqli_query($conn , $query);
				?>
				</tbody>
			</table>
			<hr>
			<center>
			<div>
				<ul class="pagination pagination-sm">
					<?php
						$rows = mysqli_num_rows($resultFull);
						$pages = 0;
						if($rows <= 10) {
							$pages = 1;
						} else if (($rows % 10 ) == 0) {
							$pages = $rows / 10;
						} else {
							$pages = floor($rows / 10) + 1;
						}
						$pageNow = $_GET['page'];
						$count = $pageNow;
						$pageBefore = $pageNow - 1;
						$pageNext = $pageNow + 1;
						if ($pageNow > 1) {
							if (isset($_GET['filtersubmit'])) {
								$date = $_GET['dateinventory'];
								$status = $_GET['status'];
								
								echo "<li><a href='inventory_list?page=$pageBefore&dateinventory=$date&status=$status&filtersubmit='>Previous</a></li>";
							}else{
								echo "<li><a href='inventory_list?page=$pageBefore'>Previous</a></li>";
							}
						}
						$x = 1;
						while ($count <= $pages && $x <= 5) {
							if (isset($_GET['filtersubmit'])) {
								$date = $_GET['dateinventory'];
								$status = $_GET['status'];
								echo "<li><a href='inventory_list?page=$count&dateinventory=$date&status=$status&filtersubmit='>$count</a></li>";
							}else{
								echo "<li><a href='inventory_list?page=$count'>$count</a></li>";
							}
							$count = $count + 1;
							$x = $x + 1;
						}
						if ($pageNow < $pages) {
							if (isset($_GET['filtersubmit'])) {
								$date = $_GET['dateinventory'];
								$status = $_GET['status'];
								
								echo "<li><a href='inventory_list?page=$pageNext&dateinventory=$date&status=$status&filtersubmit='>Next</a></li>";
							}else{
								echo "<li><a href='inventory_list?page=$pageNext'>Next</a></li>";
							}
						}
						echo"<br><br><h6>($pageNow / $pages)</h6>";
					?>
				</ul>
			</div>
			</center>
		</div>
		<br><br><br>
	</div>
<br><br><br><br><br><br>
<?php 
	require('footer.php');
?>