<?php 
	require('header.php');
?>
<div class= "container-fluid">
	<form class="form">
		<table class="table">
			<tr>
				<td></td>
				<td>Start Date</td>
				<td>End Date</td>
			</tr>
			<tr>
				<td>Final Pick Up Date</td>
				<td><input type="date" name="final-date"></td>
				<td><input type="date" name="end-date"></td>
			</tr>
			<tr>
				<td>Customer Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Payment Note</td>
				<td><input type="text" name="note"></td>
			</tr>
			<tr>
				<td>Subscription Plan</td>
				<td><input type="number" name="sub-plan"> Month</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button class="btn btn-primary" id="loginbutton" type="submit"><b>Submit</b></button>
				</td>
			</tr>
		</table>
	</form>
	<h5>Subscription Schedule</h5>
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