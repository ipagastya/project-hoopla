<?php
	require('header.php');
	include "config.php";

	$queryTest = "SELECT *
			FROM MONTH AS M
			WHERE MONTH(NOW()) = M.month AND YEAR(NOW()) = M.year";
				
	$resultTest = mysqli_query($conn, $queryTest);                          

	if(!$resultTest) {
		print("Couldn't execute test query");
		die(mysqli_connect_error());
	}

	if(mysqli_num_rows($resultTest) < 1) {
		$queryInsert = "INSERT INTO MONTH VALUES (DEFAULT, MONTH(NOW()), YEAR(NOW()))";
		if(!($resultInsert = mysqli_query($conn, $queryInsert))){
			print("Month Error");
			die(mysqli_connect_error());
               	}
	}

	
?>
<div class= "container">
	<form action="libs/download_delivery">
		<div class='form-group'>
			<button class="greenbutton control-label" type="submit" name="download-delivery">
				<center>Download Report</center>
			</button>
		</div>
	</form>
	<h4>Delivery Report</h4>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center" colspan="4">Customer</th>
					<th class="text-center" rowspan="2">Toys</th>
					<th class="text-center" rowspan="2">Delivery Date</th>
				</tr>
				<tr>
					<th class="text-center">Name</th>
					<th class="text-center">Address</th>
					<th class="text-center">City</th>
					<th class="text-center">Province</th>
					<th class="text-center">Home</th>
					<th class="text-center">Mobile</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(!isset($_GET['page'])) {
						$offset = 0;
						$page = 1;
					} else {
						$page = $_GET['page'];
						$offset = ($page - 1) * 10;
					}

					$query = "SELECT DL.delivery_id, DL.delivery_date, C.cust_name, C.address, C.phone_home, C.phone_mobile
							FROM DELIVERY_LIST AS DL, CUSTOMER AS C
							WHERE YEARWEEK(NOW()) = YEARWEEK(DL.delivery_date)
								AND DL.cust_id = C.cust_id
							ORDER BY DL.delivery_date ASC";
				
					$result = mysqli_query($conn, "$query LIMIT 10 OFFSET $offset");
					$resultFull = mysqli_query($conn, $query);                            
					if(!$result) {
					    print("Couldn't execute delivery query");
					    die(mysqli_connect_error());
					} else if(!$resultFull) {
					    print("Couldn't execute complete delivery query");
					    die(mysqli_connect_error());
					}

					while($row = mysqli_fetch_row($result)) {
						$deliveryid = $row[0];
						$date = $row[1];
						$name = $row[2];
						$address = $row[3];
						$home= $row[4];
						$mobile = $row[5];
						$resultArr = [];
						
						$querySub = "SELECT I.toy_name
								FROM DELIVERY_TOYS AS DT, INVENTORY AS I
								WHERE DT.delivery_id = '$deliveryid'
									AND DT.product_code = I.product_code";
						
						$resultSub = mysqli_query($conn, $querySub);
						
						if(!$resultSub) {
						    print("Couldn't execute delivery report 2 query");
						    die(mysqli_connect_error());
						}
						
						echo "<tr>
							<td>$name</td>
							<td>$address</td>
							<td>$home</td>
							<td>$mobile</td>
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
		<ul class="pagination pagination-sm">
			<?php
            	$rows = mysqli_num_rows($resultFull);
                $pages = 0;
                if($page > 2) {
                	$count = $page - 2;
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

            	if($pages > 1 && $page != 1) {
            		$prev = $page - 1;
            		echo "<li><a href='report_delivery?page=$prev'><</a></li>";
            	} 

            	if($count != 1) {
            		echo "<li><a>...</a></li>";
            	}
            	while ($count <= $pages && $count <= ($page + 2)) {
            		if($count == $page) {
            			echo "<li class='active'><a href='report_delivery?page=$page'>$count</a></li>";
            		} else {
                		echo "<li><a href='report_delivery?page=$count'>$count</a></li>";
              		}
                	$count = $count + 1;
                }

                if($count != $pages + 1) {
                	echo "<li><a>...</a></li>";
                }

                if($pages > 1 && $page < $pages) {
            		$next = $page + 1;
            		echo "<li><a href='report_delivery?page=$next'>></a></li>";
            	}
            ?>
        </ul>
    </div>	
</div>
<?php
    require('footer.php');
?>
