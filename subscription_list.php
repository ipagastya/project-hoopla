<?php 
	require('header.php');
?>
<div class= "container-fluid">
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
	</table>
	<h5>Subscription Schedule</h5>
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
	<div align="right">
		<button class="btn" type="button">Add Subscription</button>
	</div>
</div>
<?php
	require('footer.php');
?>