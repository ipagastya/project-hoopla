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
			<div class="col-sm-11"></div>
			<button class="btn btn-primary greenbutton control-label col-sm-1" type="submit"><b class="submit-text">Submit</b></button>
		</div>
	</form>
	<h4><b>Subscription Schedule</b></h4>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Customer's Name</td>
				<td>New/Ext</td>
				<td>Subscription Plan</td>
				<td>No of Toys / Month</td>
				<td>First Delivery Date</td>
				<td>Final Pick Up Date</td>
				<td>Payment Note</td>
				<td>Details</td>
			</tr>
			<?php 
				// from content db
			?>
		</table>
	</div>
	<div align="right">
		<button class="btn btn-default addbutton" type="button"><span class="glyphicon glyphicon-plus"></span> Add Subscription</button>
	</div>
</div>
<?php
	require('footer.php');
?>