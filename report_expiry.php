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
</div>
<?php
    require('footer.php');
?>
