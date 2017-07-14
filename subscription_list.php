<?php 
	require('header.php');
?>
<div class= "container">
	<form class="form-horizontal">
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
			<button class="btn btn-primary greenbutton control-label col-sm-1" type="submit"><b class="submit-text">Submit</b></button>
			<div class="col-sm-8"></div>
		</div>
	</form>
	<br>
	<div align="right">
		<button class="btn btn-default addbutton" type="button"><span class="glyphicon glyphicon-plus"></span> Add Subscription</button>
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
				// from content db
			?>
		</table>
	</div>
	
</div>
<?php
	require('footer.php');
?>