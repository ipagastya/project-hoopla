<?php
	require_once("header.php")
?>
<form class="form-horizontal" action="insertsubscription.php" method="POST">
	<div class="form-group">
		<label class="control-label col-sm-4" for="customerName">Customer Name :</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="customerName" name="customerName">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="radio col-sm-4" for="status">Subscription Type :</label>
		<div class="col-sm-5">
			<input type="radio" class="form-control" id="status" value="new" name="New">
            <input type="radio" class="form-control" id="status" value="extension" name="Extension">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="plan">Subscription Plan :</label>
		<div class="col-sm-5">
			<input type="number" class="form-control" id="plan" name="plan">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="toypermonth">No of Toys/Month :</label>
		<div class="col-sm-5">
			<input type="number" class="form-control" id="toypermonth" name="toypermonth">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="first-deliv">First Delivery Date :</label>
		<div class="col-sm-5">
			<input type="date" class="form-control" id="first-deliv" name="first-deliv">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="sub-price">Subscription Price :</label>
		<div class="col-sm-5">
			<input type="number" class="form-control" id="sub-price" name="sub-price">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="sub-promo">Subscription Promo :</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="sub-promo" name="sub-promo">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="deliv-price">Delivery Price :</label>
		<div class="col-sm-5">
			<input type="number" class="form-control" id="deliv-price" name="deliv-price">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="deliv-promo">Delivery Promo :</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="deliv-promo" name="deliv-promo">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="deposit">Deposit Amount :</label>
		<div class="col-sm-5">
			<input type="number" class="form-control" id="deposit" name="deposit">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="pay-term">Payment Terms :</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="pay-term" name="pay-term">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="refund-date">Deposit Refund Date :</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="refund-date" name="refund-date">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="deposit-status">Deposit Status :</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="deposit-status" name="deposit-status">
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<div class="col-sm-4"></div>
		<div class="col-sm-5">
			<button class="btn btn-primary greenbutton" type="submit">Submit</button>
		</div>
		<div class="col-sm-3"></div>
	</div>
</form>
<?php
	require_once("footer.php")
?>