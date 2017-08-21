<?php 
	/*header('Cache-Control: no cache'); //no cache
	session_cache_limiter('private_no_expire'); // works*/
	require('header.php');
?>
	<div class="jumbotron">
		<br><br>
		<center><h2 class="leckerli">Inventory List</h2></center>
		<div class="container">
			<!--FILTER AREA-->
			<form class="form-horizontal collapse" id="form-filter" method="get" action="inventory_list"><br>
				<input type="hidden" name="page" value="1" /> 
				<div class="form-group">
					<label class="control-label col-sm-2" for="toysname">Toy's Name :</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="toysname" name="toysname">
					</div>
					<label class="control-label col-sm-2" for="codesearch">Product Code :</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="codesearch" name="codesearch">
					</div>
					<div class="col-sm-2"></div>
				</div>
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
				<div class="form-group">
					<label class="control-label col-sm-2" for="agebaby">Baby's Age :</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="agebaby" name="agebaby">
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
			<!--fORM UPLOAD INSTRUCTION-->
			<form class="form-horizontal collapse" id="form-upload" method="post" action="libs/upload_instruction_card" enctype="multipart/form-data"><br>
				<input type="hidden" name="page" value="1" /> 
				<div class="form-group">
					<label class="control-label col-sm-2" for="upload">Instruction Card File :</label>
					<div class="col-sm-3">
						<input type="file" id="upload" name="upload">
					</div>
					<div class="col-sm-7"></div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-3"></div>
					<button class="greenbutton control-label col-sm-2" type="submit" name="uploadsubmit" id="uploadsubmit"><center>Submit</center></button>
				</div>
			</form>
			<div align="right">
				<div class="btn-group" >
					<button class="filterbtn" data-toggle="collapse" data-target="#form-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
					<a href="inventory_create"><button class="addbutton" type="button"><span class="glyphicon glyphicon-plus"></span> Add Inventory</button></a>
					<button class="addbutton" data-toggle="collapse" data-target="#form-upload"><span class="glyphicon glyphicon-upload"></span> Upload</button>
				</div>
			</div>
		</div>

	</div>
	<!--============================-->
	<div class="container">
		<h4>Inventory Table</h4>
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
						<th>Instruction Card</th>
						<th>Last Modified</th>
					</tr>
				</thead>
				<tbody>
				<?php
					include "config.php";
					if(isset($_GET['filtersubmit'])){
						$toysname = $_GET['toysname'];
						$codesearch = $_GET['codesearch'];
						$date = $_GET['dateinventory'];
						$status = $_GET['status'];
						$age = $_GET['agebaby'];
						$today = date("Y-m-d");

						if($date != "" && $status != "--All Status--" && $age != "" && $toysname != "" && $codesearch != ""){
							$query = "SELECT * FROM INVENTORY WHERE 
									toy_name LIKE '%$toysname%' AND product_code LIKE '%$codesearch%' AND
									return_date >= '$today' AND return_date <= '$date' AND status LIKE '%$status%' AND age_lower <= '$age' AND age_upper >= '$age' ORDER BY inventory_id DESC";
						}else{
							if($date == "" && $status == "--All Status--" && $age == "" && $toysname == "" && $codesearch == ""){
								$query = "SELECT * FROM INVENTORY ORDER BY inventory_id DESC";
							}else{
								$query = "SELECT * FROM INVENTORY";
								$condition_name = "";
								$condition_code = "";
								$condition_date = "";
								$condition_status = "";
								$condition_age = "";
								$condition = "";
								$orderby = "ORDER BY inventory_id DESC";
								$count = 0;
								if($toysname != ""){
									$condition_name = " toy_name LIKE '%$toysname%'";
								}
								if($codesearch != ""){
									$condition_code = " product_code LIKE '%$codesearch%'";
								}
								if($date != ""){
									$condition_date = " return_date >= '$today' AND return_date <= '$date'";
								}
								if($status != "--All Status--"){
									$condition_status = " status LIKE '%$status%'";
								}
								if($age != ""){
									$condition_age = " age_lower <= '$age' AND age_upper >= '$age'";
								}

								if($condition_date != ""){
									$condition = $condition.$condition_date;
									$count++;
								}
								if($condition_name != ""){
									if($count > 0){
										$condition = $condition." AND";
									}
									$condition = $condition.$condition_name;
									$count++;
								}
								if($condition_code != ""){
									if($count > 0){
										$condition = $condition." AND";
									}
									$condition = $condition.$condition_code;
									$count++;
								}
								if($condition_status != ""){
									if($count > 0){
										$condition = $condition." AND";
									}
									$condition = $condition.$condition_status;
									$count++;
								}
								if($condition_age != ""){
									if($count > 0){
										$condition = $condition."AND";
									}
									$condition = $condition.$condition_age;
								}
								$query = $query." WHERE".$condition.$orderby;
								
							}
							
						}
					}
					else{
						$query = "SELECT * FROM INVENTORY ORDER BY inventory_id DESC";
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
			        	$queryIDAdmin = "SELECT username FROM ADMIN WHERE admin_id = '".$row[24]."'";
			        	$resultIDAdmin = mysqli_query($conn, $queryIDAdmin);
			        	$rowUser = mysqli_fetch_row($resultIDAdmin);
			        	echo "<tr>
			        			<td>".$row[2]."</a></td>
			        			<td>".$row[1]."</td>
			        			<td>".$row[3]."</td>
			        			<td>".$rowName1[0]."</td>
			        			<td>".$rowName2[0]."</td>
			        			<td>".$row[10]."-".$row[11]."</td>
			        			<td>".$row[4]."</td>
			        			<td>"."<a method='get' href='inventory?page=1&id=$row[0]' class='btn btn-default' name='view'>View</a>"."</td>
			        			<td><a href='libs/download_instruction_card.php?link=$row[2].pdf' class='btn btn-default'>Download</a></td>
			        			<td><h6>".$row[23]." By ".$rowUser[0]."</h6></td>
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
								$toysname = $_GET['toysname'];
								$codesearch = $_GET['codesearch'];
								$date = $_GET['dateinventory'];
								$status = $_GET['status'];
								$age = $_GET['agebaby'];
								echo "<li><a href='inventory_list?page=$pageBefore&toysname=$toysname&codesearch=$codesearch&dateinventory=$date&status=$status&agebaby=$age&filtersubmit='>Previous</a></li>";
							}else{
								echo "<li><a href='inventory_list?page=$pageBefore'>Previous</a></li>";
							}
						}
						$x = 1;
						while ($count <= $pages && $x <= 5) {
							if (isset($_GET['filtersubmit'])) {
								$toysname = $_GET['toysname'];
								$codesearch = $_GET['codesearch'];
								$date = $_GET['dateinventory'];
								$status = $_GET['status'];
								$age = $_GET['agebaby'];
								echo "<li><a href='inventory_list?page=$count&toysname=$toysname&codesearch=$codesearch&dateinventory=$date&status=$status&agebaby=$age&filtersubmit='>$count</a></li>";
							}else{
								echo "<li><a href='inventory_list?page=$count'>$count</a></li>";
							}
							$count = $count + 1;
							$x = $x + 1;
						}
						if ($pageNow < $pages) {
							if (isset($_GET['filtersubmit'])) {
								$toysname = $_GET['toysname'];
								$codesearch = $_GET['codesearch'];
								$date = $_GET['dateinventory'];
								$status = $_GET['status'];
								$age = $_GET['agebaby'];
								echo "<li><a href='inventory_list?page=$pageNext&toysname=$toysname&codesearch=$codesearch&dateinventory=$date&status=$status&agebaby=$age&filtersubmit='>Next</a></li>";
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