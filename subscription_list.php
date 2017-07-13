<?php 
	require('header.php');
?>
<div class= "container">
	<form class="form">
		<table class="table">
			<tr>
				<td></td>
				<td>Start Date</td>
				<td>End Date</td>
			</tr>
			<tr>
				<td>Final Pick Up Date</td>
				<td><input class="form-control" type="date" name="final-date"></td>
				<td><input class="form-control" type="date" name="end-date"></td>
			</tr>
			<tr>
				<td>Customer Name</td>
				<td><input class="form-control" type="text" name="name"></td>
				<td></td>
			</tr>
			<tr>
				<td>Payment Note</td>
				<td><input class="form-control" type="text" name="note"></td>
				<td></td>
			</tr>
			<tr>
				<td>Subscription Plan</td>
				<td><input class="form-control" type="number" name="sub-plan"></td>
				<td> Month</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button class="btn btn-primary greenbutton" type="submit"><b>Submit</b></button>
				</td>
			</tr>
		</table>
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