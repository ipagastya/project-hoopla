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
</div>
<?php
    require('footer.php');
?>
