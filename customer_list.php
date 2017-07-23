<?php 
	require('header.php');
?>
<div class= "container-fluid">
	<div class="container">
		<div align="right">
			<button class="addbutton" type="submit"><a href='customer.php' style='text-decoration: none; color:white;'><span class="glyphicon glyphicon-plus"></span> Add Customer</a></button>
		</div>
		<br>
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<th>No</th>
					<th>Customer's Name</th>
					<th>Baby's Name</th>
					<th>Baby's Date of Birth</th>
					<th>Baby's Age</th>
					<th>Details</th>
				</tr>
				<?php
					// loop untuk isi db
					include "config.php";
					
                            $query = "SELECT c.cust_id, c.cust_name, c.baby_name, c.baby_dob FROM CUSTOMER AS c";
                            $result = mysqli_query($conn, $query);                          
						   if(!$result){
                                print("Couldn't execute query");
                                die(mysqli_connect_error());
                            }
                            while($row = mysqli_fetch_row($result)){

								$from = new DateTime($row[3]);
								$to   = new DateTime('today');
								$id = $row[0];
								$diff = $from->diff($to);
                                $months = ($diff-> m) + 12 * $diff-> y ;
								echo "<form method='post' action='customer_view.php' class='form_group'><tbody>
											<tr>
												<td>" . $row[0] . "</td>";
											echo"<td>" . $row[1] . "<br></td>";
											echo"<td>" . $row[2] . "<br></td>";
											echo"<td>" . $row[3] . "<br></td>";
											echo"<td>" . $months . " months<br></td>";
											echo"<td><button name='view' value='". $id . "' class='addbutton' type='submit' style='text-decoration: none; color:white;'><span class='glyphicon glyphicon-eye-open'></span> View </button></td></tr></tbody>
										</form>";
                            } 
				?>
			</table>
		</div>
	<!-- belom ada pagination -->
	</div>
</div>
<br>
<br>
<br>
<?php
	require('footer.php');
?>