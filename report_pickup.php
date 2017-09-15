<?php
	require('header.php');
	include "config.php";
	include "libs/month_update.php";	
?>
<div class="jumbotron">
	<center>
	<br><br><h2 class="leckerli">Report</h2><br>
	
	<?php
		$datestart = date_format(date_create(),"Y-m-d");
		$dateend = date_create();
		date_add($dateend, date_interval_create_from_date_string('7 days'));
		$dateend = date_format($dateend,"Y-m-d");
		$filter = false;
		$start = false;
		$end = false;

		if(isset($_GET['start-date']) && $_GET['start-date']){
			$datestart = $_GET['start-date'];
			$dateend = new DateTime($datestart);
			date_add($dateend, date_interval_create_from_date_string('7 days'));
			$dateend = date_format($dateend,"Y-m-d");

			$start = true;
			$filter = true;
		}
		if (isset($_GET['end-date']) && $_GET['end-date']) {
			$dateend = $_GET['end-date'];
			
			if(!($start)) {
				$datestart = new DateTime($dateend);
				date_sub($datestart, date_interval_create_from_date_string('7 days'));
				$datestart = date_format($datestart,"Y-m-d");
			}

			$end = true;
			$filter = true;
		}

		if($dateend < $datestart) {
			$datestart = $dateend;
		}
	?>

	<form action="libs/download_pickup" method="post">
	<input type="hidden" name="date-start" value="<?php echo $datestart ?>" />
	<input type="hidden" name="date-end" value="<?php echo $dateend ?>" />
		<div class='form-group'>
			<button class="filterbtn control-label" type="submit" name="download-pickup"><span class="glyphicon glyphicon-download"></span>
				 Download Report
			</button>
		</div>
	</form>

	<div class="container">
		<form class="form-horizontal collapse" id="form-filter" method="get" action="report_pickup">
			<input type="hidden" name="page" value="1" /> 
			<div class="form-group">
				<label class="control-label col-sm-3" for="start-date">Pick Up Date</label>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="start-date">Start Date</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="start-date" name="start-date">
				</div>
				<label class="control-label col-sm-3" for="end-date">End Date</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="end-date" name="end-date">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4"></div>
				<button class="greenbutton control-label col-sm-4" type="submit" id="filtersubmit"><center>Submit</center></button>
				<div class="col-sm-4"></div>
			</div>
		</form>
		<br>
		<div align="right">
			<div class="btn-group" >
				<button class="filterbtn" data-toggle="collapse" data-target="#form-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
			</div>
			
		</div>
	</div>
	</center>
</div>
<div class= "container">
	<h4>Pick Up Report</h4>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center" colspan="6">Customer</th>
					<th class="text-center" rowspan="2">Box Name</th>
					<th class="text-center" rowspan="2">Toys</th>
					<th class="text-center" rowspan="2">Pick Up Date</th>
				</tr>
				<tr>
					<th class="text-center">Name</th>
					<th class="text-center">Address</th>
					<th class="text-center">City</th>
					<th class="text-center">Province</th>
					<th class="text-center">Home Phone</th>
					<th class="text-center">Mobile Phone</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(!isset($_GET['page'])) {
						$offset = 0;
						$page = 1;
					} else if ($_GET['page'] < 1) {
						echo "<script>location.href='report_pickup?page=1';</script>";
					} else {
						$page = $_GET['page'];
						$offset = ($page - 1) * 10;
					}

					echo $datestart.' to '.$dateend;

					$query = "SELECT DL.delivery_id, DL.pickup_date, C.cust_name, C.address, C.phone_home, C.phone_mobile, CI.city_name, P.province_name, DL.box_name
							FROM DELIVERY_LIST AS DL, CUSTOMER AS C, CITY AS CI, PROVINCE AS P
							WHERE DL.pickup_date >= DATE('$datestart')
								AND DL.pickup_date <= DATE('$dateend')
								AND DL.cust_id = C.cust_id 
								AND C.province_id = P.province_id 
								AND C.city_id = CI.city_id
							ORDER BY DL.pickup_date ASC";
				
					$result = mysqli_query($conn, "$query LIMIT 10 OFFSET $offset");
					$resultFull = mysqli_query($conn, $query);                            
					if(!$result) {
					    print("Couldn't execute pickup query");
					    die(mysqli_connect_error());
					} else if(!$resultFull) {
					    print("Couldn't execute complete pickup query");
					    die(mysqli_connect_error());
					}

					while($row = mysqli_fetch_row($result)) {
						$deliveryid = $row[0];
						$date = $row[1];
						$name = $row[2];
						$address = $row[3];
						$home= $row[4];
						$mobile = $row[5];
						$city = $row[6];
						$province = $row[7];
						$boxname = $row[8];
						$resultArr = [];
						
						$querySub = "SELECT I.toy_name
								FROM DELIVERY_TOYS AS DT, INVENTORY AS I
								WHERE DT.delivery_id = '$deliveryid'
									AND DT.product_code = I.product_code";
						
						$resultSub = mysqli_query($conn, $querySub);
						
						if(!$resultSub) {
						    print("Couldn't execute pickup report 2 query");
						    die(mysqli_connect_error());
						}
						
						echo "<tr>
							<td>$name</td>
							<td>$address</td>
							<td>$city</td>
							<td>$province</td>
							<td>$home</td>
							<td>$mobile</td>
							<td>$boxname</td>
							<td>";
						
						while($rowSub = mysqli_fetch_row($resultSub)) {
							$resultArr[] = $rowSub[0];
						}
						echo implode (", ", $resultArr);

						echo "</td><td>$date</td></tr>";
					}
				?>
			</tbody>
		</table>
	</div>
	<div>
		<ul class="pagination pagination-md">
			<?php
            	$rows = mysqli_num_rows($resultFull);
                $pages = 0;
                if($page > 5) {
                	$count = $page - 5;
           		} else {
           			$count = 1;
           		}

                if($rows <= 10) {
               		$pages = 1;
                } else if (($rows % 10 ) == 0) {
                	$pages = $rows / 10;
                } else {
                	$pages = floor($rows / 10) + 1;
            	}
            	if($filter) {
	            	if($pages > 1 && $page != 1) {
	            		$prev = $page - 1;
	            		echo "<li><a href='report_pickup?page=$prev&start-date=$datestart&end-date=$dateend'><</a></li>";
	            	} 

	            	if($count != 1) {
	            		echo "<li><a href='report_pickup?page=1&start-date=$datestart&end-date=$dateend'>1</a></li>";
	            		echo "<li><a>...</a></li>";
	            	}
	            	while ($count <= $pages && $count <= ($page + 5)) {
	            		if($count == $page) {
	            			echo "<li class='active'><a href='report_pickup?page=$page&start-date=$datestart&end-date=$dateend'>$count</a></li>";
	            		} else {
	                		echo "<li><a href='report_pickup?page=$count&start-date=$datestart&end-date=$dateend'>$count</a></li>";
	              		}
	                	$count = $count + 1;
	                }

	                if($count != $pages + 1) {
	                	echo "<li><a>...</a></li>";
	                	echo "<li><a href='report_pickup?page=$pages&start-date=$datestart&end-date=$dateend'>$pages</a></li>";
	                }

	                if($pages > 1 && $page < $pages) {
	            		$next = $page + 1;
	            		echo "<li><a href='report_pickup?page=$next&start-date=$datestart&end-date=$dateend'>></a></li>";
	            	}

            	} else {
	            	if($pages > 1 && $page != 1) {
	            		$prev = $page - 1;
	            		echo "<li><a href='report_pickup?page=$prev'><</a></li>";
	            	} 

	            	if($count != 1) {
	            		echo "<li><a href='report_pickup?page=1'>1</a></li>";
	            		echo "<li><a>...</a></li>";
	            	}
	            	while ($count <= $pages && $count <= ($page + 5)) {
	            		if($count == $page) {
	            			echo "<li class='active'><a href='report_pickup?page=$page'>$count</a></li>";
	            		} else {
	                		echo "<li><a href='report_pickup?page=$count'>$count</a></li>";
	              		}
	                	$count = $count + 1;
	                }

	                if($count != $pages + 1) {
	                	echo "<li><a>...</a></li>";
	                	echo "<li><a href='report_pickup?page=$pages'>$pages</a></li>";
	                }

	                if($pages > 1 && $page < $pages) {
	            		$next = $page + 1;
	            		echo "<li><a href='report_pickup?page=$next'>></a></li>";
	            	}
	            }
            ?>
        </ul>
    </div>	
</div>
<?php
    require('footer.php');
?>
