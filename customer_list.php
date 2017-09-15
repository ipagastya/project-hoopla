<?php 
	require('header.php');
?>
<div class="jumbotron">
	<br><br><center><h2 class="leckerli">Customer List</h2></center>
	<div class="container">
		<div align="right">
			<button class="addbutton" type="submit"><a href='customer.php' style='text-decoration: none; color:white;'><span class="glyphicon glyphicon-plus"></span> Add Customer</a></button>
		</div>
	</div>
</div>
<div class= "container-fluid">
	<div class="container">
		<br>
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<th>No</th>
					<th>Customer's Name</th>
					<th>Baby's Name</th>
					<th>Baby's Gender</th>
					<th>Baby's Date of Birth</th>
					<th>Baby's Age</th>
					<th>Details</th>
				</tr>
				<?php
					// loop untuk isi db
					include "config.php";
					$offset = ($_GET['page'] - 1) * 10;
					
                            $query = "SELECT c.cust_id, c.cust_name, c.baby_name, c.baby_gender, c.baby_dob FROM CUSTOMER AS c";
                            $result = mysqli_query($conn, "$query LIMIT 10 OFFSET $offset");                          
							$resultFull = mysqli_query($conn , $query);
						   if(!$result){
                                print("Couldn't execute query");
                                die(mysqli_connect_error());
                            }
                            while($row = mysqli_fetch_row($result)){

								$from = new DateTime($row[4]);
								$to   = new DateTime('today');
								$diff = $from->diff($to);
                                $months = ($diff-> m) + 12 * $diff-> y ;
								echo "<tbody><tr><td>" . $row[0] . "</td>";
											echo"<td>" . $row[1] . "<br></td>";
											echo"<td>" . $row[2] . "<br></td>";
											echo"<td>" . $row[3] . "<br></td>";
											echo"<td>" . $row[4] . "<br></td>";
											echo"<td>" . $months . " months<br></td>";
											echo"<td>"."<a method='get' href='customer_view?id=$row[0]' class='btn btn-default' name='view'>View</a>"."</td></tr></tbody>";
                            } 
				?>
			</table>
		</div>
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
</div>
<br>
<br>
<br>
<?php
	require('footer.php');
?>