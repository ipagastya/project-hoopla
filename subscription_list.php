<?php 
	require('header.php');
?>
<div class= "container">
	<button class="addbutton" data-toggle="collapse" data-target="#form-filter"><span class="glyphicon glyphicon-filter"></span></button>
	<form class="form-horizontal collapse" id="form-filter">
		<div class="form-group">
			<label class="control-label col-sm-3" for="start-date">Final Pickup Date :</label>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="start-date">Start Date</label>
			<div class="col-sm-3">
				<input type="date" class="form-control" id="start-date" name="start-date">
			</div>
			<label class="control-label col-sm-3" for="end-date">End Date</label>
			<div class="col-sm-3">
				<input type="date" class="form-control" id="end-date" name="end-date">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="name">Customer Name :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="name" name="name">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="note">Payment Note :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="note" name="note">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="sub-plan">Subscription Plan :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="sub-plan" name="sub-plan">
			</div>
			<label class="control-label col-sm-1" for="sub-plan">Month</label>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<div class="col-sm-3"></div>
			<button class="greenbutton control-label col-sm-1" type="submit"><b class="submit-text">Submit</b></button>
			<div class="col-sm-8"></div>
		</div>
	</form>
	<br>
	<div align="right">
		<a href="subscription_create.php"><button class="addbutton" type="button"><span class="glyphicon glyphicon-plus"></span> Add Subscription</button></a>
	</div>
	<h4>Subscription Schedule</h4>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Customer's Name</th>
				<th>New/Ext</th>
				<th>Subscription Plan</th>
				<th>No of Toys / Month</th>
				<th>First Delivery Date</th>
				<th>Final Pick Up Date</th>
				<th>Payment Note</th>
				<th>Details</th>
			</tr>
			<?php
				include "config.php";
				$sql = "SELECT subs_id, cust_name, status, subs_plan, num_ofToys, first_deliv, final_pickup, payment_terms FROM SUBSCRIPTION AS S JOIN CUSTOMER AS C ON S.cust_id = C.cust_id ";
				if (($result = mysqli_query($conn, $sql)) === FALSE){
					echo "query failing";
				}
				else {
					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) { ?>
							<tr>
								<td><?=$row['cust_name']?></td>
								<td><?=$row['status']?></td>
								<td><?=$row['subs_plan']?></td>
								<td><?=$row['num_ofToys']?></td>
								<td><?=$row['first_deliv']?></td>
								<td><?=$row['final_pickup']?></td>
								<td><?=$row['payment_terms']?></td>
								<td><a class='btn btn-default' href="subscription.php?subs_id=<?=$row['subs_id']?>"></a></td>
							</tr>
						<?php }
					}
				}
				// from content db
			?>
		</table>
	</div>
	
</div>
<?php
	require('footer.php');
?>