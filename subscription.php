<?php 
require('header.php');

?>
<div class= "container">
	<form class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2" for="customerName">Customer Name :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="customerName" name="customerName" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="status">New/Extension :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="status" name="status" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="plan">Subscription Plan :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="plan" name="plan" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="plan">No of Toys/Month :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="plan" name="plan" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="first-deliv">First Delivery Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="first-deliv" name="first-deliv" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="sub-price">Subscription Price :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="sub-price" name="sub-price" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="sub-promo">Subscription Promo :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="sub-promo" name="sub-promo" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-price">Delivery Price :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="deliv-price" name="deliv-price" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-promo">Delivery Promo :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deliv-promo" name="deliv-promo" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deposit">Deposit Amount :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="deposit" name="deposit" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pay-term">Payment Terms :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="pay-term" name="pay-term" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="refund-date">Deposit Refund Date :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="refund-date" name="refund-date" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deposit-status">Deposit Status :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deposit-status" name="deposit-status" value="<?="test"?>">
			</div>
			<div class="col-sm-5"></div>
		</div>
	</form>
	<hr>
	<div align="right">
		<a href="delivery.php" class="btn btn-primary addbutton"><span class="glyphicon glyphicon-plus"></span> Create Delivery</a>
	</div>
	<h4>Delivery Schedule</h4>
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