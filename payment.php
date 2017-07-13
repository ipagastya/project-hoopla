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
		</form>
	</div>
<?php 
	require_once('footer.php');
?>