<div class="table-responsive" id="tableID">
	<table class="table table-hover">
		<?php
					// loop untuk isi db
		include "config.php";
		$offset = (1 - 1) * 10;
		$name = $_POST['name'];
		$query = "SELECT c.cust_id, c.cust_name, c.baby_name, c.baby_gender, c.baby_dob FROM CUSTOMER AS c WHERE cust_name LIKE '%$name%' ORDER BY cust_id ASC";
		$result = mysqli_query($conn, "$query LIMIT 10 OFFSET $offset");
		$resultFull = mysqli_query($conn , $query);
		if(!$result){
			print("Couldn't execute query");
			die(mysqli_connect_error());
		}
		echo "<tr>
		<th>No</th>
		<th>Customer's Name</th>
		<th>Baby's Name</th>
		<th>Baby's Gender</th>
		<th>Baby's Date of Birth</th>
		<th>Baby's Age</th>
		<th>Details</th>
	</tr>";
	while($row = mysqli_fetch_row($result)){

		$from = new DateTime($row[4]);
		$to   = new DateTime('today');
		$diff = $from->diff($to);
		$months = ($diff-> m) + 12 * $diff-> y ;
		echo "<tr><td>" . $row[0] . "</td>";
		echo"<td>" . $row[1] . "<br></td>";
		echo"<td>" . $row[2] . "<br></td>";
		echo"<td>" . $row[3] . "<br></td>";
		echo"<td>" . $row[4] . "<br></td>";
		echo"<td>" . $months . " months<br></td>";
		echo"<td>"."<a method='get' href='customer_view?id=$row[0]' class='btn btn-default' name='view'>View</a>"."</td></tr>";
	} 
	?>
</table>
<!-- pagination -->
	<div>
		<ul class="pagination pagination-sm">
			<?php
			$rows = mysqli_num_rows($resultFull);
			$pages = 0;
			$count = 1;
			if($rows <= 10) {
				$pages = 1;
			} else if (($rows % 10 ) == 0) {
				$pages = $rows / 10;
			} else {
				$pages = floor($rows / 10) + 1;
			}
			while ($count <= $pages) {
				echo "<li><a href='customer_list?page=$count'>$count</a></li>";
				$count = $count + 1;
			}
			?>
		</ul>
	</div>
</div>
