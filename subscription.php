<?php 
	require('header.php');
?>
<div class= "container">
	<form class="form">
		<table>
			<tr>
				<td>Customer Name<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="text" name="Customer Name"> <br></td>
			</tr>
			<tr>
				<td>New/Extension<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="text" name="status"><br></td>
			</tr>
			<tr>
				<td>Subscription Plan<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="number" name="plan"><br></td>
				<td>&nbsp Month</td>
			</tr>
			<tr>
				<td>No of Toys/Month<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="number" name="toypermonth"><br></td>
			</tr>
			<tr>
				<td>First Delivery Date<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="date" name="first-deliv"><br></td>
			</tr>
			<tr>
				<td>Subscription Price<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="number" name="sub-price"><br></td>
			</tr>
			<tr>
				<td>Subsrciption Promo<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="text" name="sub-promo"><br></td>
			</tr>
			<tr>
				<td>Delivery Price<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="number" name="deliv-price"><br></td>
			</tr>
			<tr>
				<td>Delivery Promo<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="date" name="deliv-promo"><br></td>
			</tr>
			<tr>
				<td>Deposit Amount<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="number" name="deposit"><br></td>
			</tr>
			<tr>
				<td>Payment Terms<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="text" name="pay-term"><br></td>
			</tr>
			<tr>
				<td>Deposit Refund Date<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="text" name="refund-date"><br></td>
			</tr>
			<tr>
				<td>Deposit Status<br></td>
				<td> &nbsp : &nbsp <br></td>
				<td><input class="form-control" type="text" name="deposit-status"><br></td>
			</tr>
		</table><br>
		<button class="btn btn-primary greenbutton" type="submit">Submit</button>
	</form>
	<hr>
	<div align="right">
		<button class="btn btn-primary addbutton" type="button"><span class="glyphicon glyphicon-plus"></span> Create Delivery</button>
	</div>
	<h6>Delivery Schedule</h6>
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>No</th>
				<th>Address</th>
				<th>City</th>
				<th>Province</th>
				<th>Mobile Phone</th>
				<th>Home Phone</th>
				<th>Delivery Date</th>
				<th>Pick Up Date</th>
				<th>Actual Delivery Charge</th>
				<th>Actual Pickup Charge</th>
				<th>Payment Note</th>
				<th>Note</th>
				<th>Baby's Age</th>
				<th>Box Name</th>
				<th>Details of Toys</th>
			</tr>
			<?php 
				// isi dari database
			 ?>
		</table>
	</div>
		<?php 
			// pagination
		 ?>
</div>
	
<?php
	require('footer.php');
?>