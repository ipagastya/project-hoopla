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
	<h4>Delivery Report</h4>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan="2">Customer</th>
					<th rowspan="2">Toys</th>
					<th rowspan="2">Delivery Date</th>
				</tr>
				<tr>
					<th>Name</th>
					<th>Address</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = "SELECT DL.delivery_id, DL.delivery_date, C.cust_name, C.address
							FROM DELIVERY_LIST AS DL, CUSTOMER AS C
							WHERE YEARWEEK(NOW()) = YEARWEEK(DL.delivery_date)
								AND DL.cust_id = C.cust_id
							ORDER BY DL.delivery_date ASC";
				
					$result = mysqli_query($conn, $query);                          

					if(!$result) {
					    print("Couldn't execute delivery report 1 query");
					    die(mysqli_connect_error());
					}

					while($row = mysqli_fetch_row($result)) {
						$deliveryid = $row[0];
						$date = $row[1];
						$name = $row[2];
						$address = $row[3];
						
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
							<td>";
						
						//$flag = TRUE;
						/*while($rowSub = mysqli_fetch_row($resultSub)) {
							if($flag) {
								echo $rowSub[0];
								$flag = FALSE;
							} else {
								echo ", ".$rowSub[0]."";
							}
							$tempstr = implode(", ", $rowSub);
							echo $tempstr;
						}*/
						echo implode (", ", mysqli_fetch_array($resultSub));

						echo "</td><td>$date</td></tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php
    require('footer.php');
?>
