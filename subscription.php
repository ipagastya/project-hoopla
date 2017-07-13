<?php 
	require('header.php');
?>
<div class= "container-fluid">
	<form class="form">
		<table>
			<tr>
				<td>Customer Name</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="text" name="Customer Name"></td>
			</tr>
			<tr>
				<td>New/Extension</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="text" name="status"></td>
			</tr>
			<tr>
				<td>Subscription Plan</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="number" name="plan"></td>
				<td>&nbsp Month</td>
			</tr>
			<tr>
				<td>No of Toys/Month</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="number" name="toypermonth"></td>
			</tr>
			<tr>
				<td>First Delivery Date</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="date" name="first-deliv"></td>
			</tr>
			<tr>
				<td>Subscription Price</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="number" name="sub-price"></td>
			</tr>
			<tr>
				<td>Subsrciption Promo</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="text" name="sub-promo"></td>
			</tr>
			<tr>
				<td>Delivery Price</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="number" name="deliv-price"></td>
			</tr>
			<tr>
				<td>Delivery Promo</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="date" name="deliv-promo"></td>
			</tr>
			<tr>
				<td>Deposit Amount</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="number" name="deposit"></td>
			</tr>
			<tr>
				<td>Payment Terms</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="text" name="pay-term"></td>
			</tr>
			<tr>
				<td>Deposit Refund Date</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="text" name="refund-date"></td>
			</tr>
			<tr>
				<td>Deposit Status</td>
				<td> &nbsp : &nbsp </td>
				<td><input type="text" name="deposit-status"></td>
			</tr>
		</table><br>
		<button class="btn" type="submit">Submit</button>
	</form>
	<div align="right">
		<button class="btn" type="button">Create Delivery</button>
	</div>
	<h6>Delivery Schedule</h6>
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<td>No</td>
				<td>Address</td>
				<td>City</td>
				<td>Province</td>
				<td>Mobile Phone</td>
				<td>Home Phone</td>
				<td>Delivery Date</td>
				<td>Pick Up Date</td>
				<td>Actual Delivery Charge</td>
				<td>Actual Pickup Charge</td>
				<td>Payment Note</td>
				<td>Note</td>
				<td>Baby's Age</td>
				<td>Box Name</td>
				<td>Details of Toys</td>
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