<?php  
require_once('header.php');
?>
<div class="container">
	<form class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliveryID">Delivery ID :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deliveryID" name="deliveryID">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="address">Address :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="address" name="address">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="city">City :</label>
			<div class="col-sm-5">	
				<select class="form-control" id="city" name="city">
					<option value=''>Select city</option>
					<?php
							// loop isi city dari db
					?>
				</select>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="province">Province :</label>
			<div class="col-sm-5">	
				<select class="form-control" id="province" name="province">
					<option value=''>Select province</option>
					<?php
							// loop isi province dari db
					?>
				</select>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="mobile">Mobile Number :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="mobile" name="mobile">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="home">Home Number :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="home" name="home">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-date">Delivery Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="deliv-date" name="deliv-date">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pick-date">Pickup Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="pick-date" name="pick-date">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-charge">Actual Delivery Charge :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="deliv-charge" name="deliv-charge">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pick-charge">Actual Pickup Charge :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="pick-charge" name="pick-charge">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pay-note">Payment Note :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="pay-note" name="pay-note">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="note">Note :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="note" name="note">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="age">Baby's Age :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="age" name="age">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="name">Baby's Name :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="name" name="name">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="toy">Toys :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="toy" name="toy">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-promo">Delivery Promo :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deliv-promo" name="deliv-promo">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deposit">Deposit Amount :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="deposit" name="deposit">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pay-term">Payment Terms :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="pay-term" name="pay-term">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="refund-date">Deposit Refund Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="refund-date" name="refund-date">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deposit-status">Deposit Status :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deposit-status" name="deposit-status">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-schedule">Delivery Schedule :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deliv-schedule" name="deliv-schedule">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="select-toys">Select Toys :</label>
			<div class="col-sm-5">
				<select class="selectpicker" multiple data-selected-text-format="count > 3">
					<option>Item 1</option>
					<option>Item 2</option>
					<option>Item 3</option>
					<option>Item 1</option>
					<option>Item 2</option>
					<option>Item 3</option>
					</select>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-5">
				<button class="btn btn-primary greenbutton" type="submit"><a href='#' style='text-decoration: none; color:white;'>Submit</a></button>
			</div>
			<div class="col-sm-5"></div>
		</div>
	</form>
</div>
<br>
<br>
<?php 
require_once('footer.php');
?>