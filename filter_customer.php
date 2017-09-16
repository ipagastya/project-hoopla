
<?php
					// loop untuk isi db
				include "config.php";
				$name = $_POST['name'];
				$query = "SELECT c.cust_id, c.cust_name, c.baby_name, c.baby_gender, c.baby_dob FROM CUSTOMER AS c WHERE cust_name LIKE '%$name%' ORDER BY cust_id ASC";
				$result = mysqli_query($conn , $query);
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