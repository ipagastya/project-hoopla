<?php 
	require('header.php');
?>
<div class= "container-fluid">
	<div align="right">
		<button class="button" type="button">Add Customer</button>
	</div>
	<table class="table table-hover">
		<tr>
			<td>No</td>
			<td>Customer's Name</td>
			<td>Baby's Name</td>
			<td>Baby's Date of Birth</td>
			<td>Baby's Age</td>
			<td>Details</td>
		</tr>
		<?php
			// loop untuk isi db
		?>
	</table>

	<!-- belom ada pagination -->
</div>
	
<?php
	require('footer.php');
?>