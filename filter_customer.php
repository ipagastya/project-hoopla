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
		<th>Delete</th>
	</tr>";
	$idGet;
	while($row = mysqli_fetch_row($result)){

		$from = new DateTime($row[4]);
		$to   = new DateTime('today');
		$diff = $from->diff($to);
		$months = ($diff-> m) + 12 * $diff-> y ;
		$idGet = $row[0];
		echo "<tr><td>" . $row[0] . "</td>";
		echo"<td>" . $row[1] . "<br></td>";
		echo"<td>" . $row[2] . "<br></td>";
		echo"<td>" . $row[3] . "<br></td>";
		echo"<td>" . $row[4] . "<br></td>";
		echo"<td>" . $months . " months<br></td>";
		echo"<td>"."<a method='get' href='customer_view?id=$row[0]' class='btn btn-default' name='view'>View</a>"."</td>";
		echo"<td>"."<a method='get' data-toggle='modal' data-target='#modalDelete' class='btn btn-danger' name='delete'> <span class='glyphicon glyphicon-remove'></span> Delete </a>"."</td></tr>";
	} 
	?>
</table>
		<div class="modal fade" id="modalDelete" role="dialog">
			<div class="modal-dialog modal-md">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        <div class="modal-body"><center>
		          <p>Are you sure want to delete this customer ?</p></center>
		        </div>
		        <div class="modal-footer">
		        	<center>
		        	<div class="btn-group">
		        		<?php
		        			$query = "SELECT c.cust_id, c.cust_name, c.baby_name, c.baby_gender, c.baby_dob FROM CUSTOMER AS c ORDER BY cust_id ASC";
							$result = mysqli_query($conn, "$query LIMIT 10 OFFSET $offset");                          
							$resultFull = mysqli_query($conn , $query);
							if(!$result){
								print("Couldn't execute query");
								die(mysqli_connect_error());
							}
							echo "<a method='get' href='libs/delete_customer?id=$idGet' class='addbutton'><span class='glyphicon glyphicon-ok'></span> Yes</a>";
		        		?>
		        		<button type="button" class="filterbtn" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
		        	</div>
		        	</center>
		        </div>
		      </div>
		    </div>
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
