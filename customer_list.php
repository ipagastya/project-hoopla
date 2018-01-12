<?php 
require('header.php');
?>
<div class="jumbotron">
	<br><br><center><h2 class="leckerli">Customer List</h2></center>
	<div class="container">
		<div align="right">
			<!--FILTER AREA-->
			<br>
			<div align = "left">
				<div class="col-sm-4">
					<input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Search Customer Name...">
				</div>
			</div>
			<div align="right" class="col-sm-8">
				<div class="btn-group" >
					<button class="addbutton" type="submit"><a href='customer.php' style='text-decoration: none; color:white;'><span class="glyphicon glyphicon-plus"></span> Add Customer</a></button>
				</div>
			</div>
		</div>
	</div>
	<!--============================-->
</div>
<div class= "container-fluid">
	<div class="container">
		<br>
		<div class="table-responsive" id= "tableID">
			<table class="table table-hover">
				<tr>
					<th>No</th>
					<th>Customer's Name</th>
					<th>Baby's Name</th>
					<th>Baby's Gender</th>
					<th>Baby's Date of Birth</th>
					<th>Baby's Age</th>
					<th>Details</th>
					<th>Delete</th>
				</tr>
				<?php
					// loop untuk isi db
				include "config.php";
				$offset = ($_GET['page'] - 1) * 10;

				$query = "SELECT c.cust_id, c.cust_name, c.baby_name, c.baby_gender, c.baby_dob FROM CUSTOMER AS c ORDER BY cust_id ASC";
				$result = mysqli_query($conn, "$query LIMIT 10 OFFSET $offset");                          
				$resultFull = mysqli_query($conn , $query);
				if(!$result){
					print("Couldn't execute query");
					die(mysqli_connect_error());
				}
				$idGet;
				while($row = mysqli_fetch_row($result)){

					$from = new DateTime($row[4]);
					$to   = new DateTime('today');
					$diff = $from->diff($to);
					$months = ($diff-> m) + 12 * $diff-> y ;
					$idGet = $row[0];
					echo "<tbody><tr><td>" . $row[0] . "</td>";
					echo"<td>" . $row[1] . "<br></td>";
					echo"<td>" . $row[2] . "<br></td>";
					echo"<td>" . $row[3] . "<br></td>";
					echo"<td>" . $row[4] . "<br></td>";
					echo"<td>" . $months . " months<br></td>";
					echo"<td>"."<a method='get' href='customer_view?id=$row[0]' class='btn btn-default' name='view'> View </a>"."</td>";
					echo"<td>"."<a method='get' data-toggle='modal' data-target='#modalDelete' class='btn btn-danger' name='delete'> <span class='glyphicon glyphicon-remove'></span> Delete </a>"."</td></tr></tbody>";
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
		<center>
			<div>
				<ul class="pagination pagination-sm">
					<?php
						$rows = mysqli_num_rows($resultFull);
						$pages = 0;
						if($rows <= 10) {
							$pages = 1;
						} else if (($rows % 10 ) == 0) {
							$pages = $rows / 10;
						} else {
							$pages = floor($rows / 10) + 1;
						}
						$pageNow = $_GET['page'];
						$count = $pageNow;
						$pageBefore = $pageNow - 1;
						$pageNext = $pageNow + 1;
						
						if ($pageNow > 1) {
							echo"<li><a href='customer_list?page=$pageBefore'>Previous</a></li>";
						}
						$x = 1;
						while ($count <= $pages && $x <= 5) {
							echo "<li><a href='customer_list?page=$count'>$count</a></li>";
							$count = $count + 1;
							$x = $x + 1;
						}
						if ($pageNow < $pages) {
							echo "<li><a href='customer_list?page=$pageNext'>Next</a></li>";
						}
						echo"<br><br><h6>($pageNow / $pages)</h6>";
					?>
				</ul>
			</div>
		</center>
		</div>
	</div>
</div>
<br>
<br>
<br>
<script src="libs/jquery/dist/jquery.min.js"></script>
<script>
	$("#customer_name").keyup(function(){
		$("#tableID").empty();
		var customerName = $(this).val();
		$.ajax({
			type: "POST",
			url: "filter_customer.php",
			data: {name: customerName},
			success: function(response){
				$("#tableID").html(response);
			}
		});
	});
</script>
<?php
require('footer.php');
?>