<?php
require('header.php');
include "config.php";
?>
<div class= "container">
   	 <h4>Subscription Report</h4>
	    <div class="table-responsive">
		<table class="table table-bordered">
			<thead>
			    <tr>
					<th rowspan="2">Month/Year</th>
					<th colspan="4">New Customer</th>
					<th colspan="4">Expired Subscription</th>
					<th colspan="4">Extending Subscription</th>
					<th>Nett Subscribers</th>
					<th rowspan="2">Subscription Commited</th>
			    </tr>
			    <tr>
					<th>Total</th>
					<th>1 MO</th>
					<th>3 MO</th>
					<th>6 MO</th>
					<th>Total</th>
					<th>1 MO</th>
					<th>3 MO</th>
					<th>6 MO</th>
					<th>Total</th>
					<th>1 MO</th>
					<th>3 MO</th>
					<th>6 MO</th>
					<th>Total</th>
			    </tr>
			</thead>
			<tbody>
			    <?php
				$query = "SELECT * FROM CUSTOMER_REPORT";
				$result = mysqli_query($conn, $query);                          

				if(!$result) {
				    print("Couldn't execute customer report query");
				    die(mysqli_connect_error());
				}

				while($row = mysqli_fetch_row($result)) {
					echo "	<tr>
							<td>".$row[0]."/".$row[1]."</td>
							<td>".$row[2]."</td>
							<td>".$row[3]."</td>
							<td>".$row[4]."</td>
							<td>".$row[5]."</td>
							<td>".$row[6]."</td>
							<td>".$row[7]."</td>
							<td>".$row[8]."</td>
							<td>".$row[9]."</td>
							<td>".$row[10]."</td>
							<td>".$row[11]."</td>
							<td>".$row[12]."</td>
							<td>".$row[13]."</td>
							<td>".$row[14]."</td>
							<td>".$row[15]."</td>
						</tr>";
				}
			    ?>
			</tbody>
		</table>
	    </div>
	
	<h4>Expiring Subscriptions</h4>
	    <div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Customer Name</th>
					<th>Expiry Date</th>
					<th>Subscription Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = "SELECT * FROM CUSTOMER_EXPIRY";
					$result = mysqli_query($conn, $query);                          

					if(!$result) {
					    print("Couldn't execute customer expiry query");
					    die(mysqli_connect_error());
					}

					while($row = mysqli_fetch_row($result)) {
						echo "	<tr>
								<td>".$row[0]."</td>
								<td>".$row[1]."</td>
								<td>".$row[2]."</td>
							</tr>";
					}
				?>
			</tbody>
		 </table>
	    </div>
	
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
						
						$flag = TRUE;
						while($rowSub = mysqli_fetch_row($resultSub)) {
							if($flag) {
								echo $rowSub[0];
								$flag = FALSE;
							} else {
								echo ", ".$rowSub[0]."";
							}
						}
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
