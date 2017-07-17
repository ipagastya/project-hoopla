<?php 
	require('header.php');
?>
<div class= "container-fluid">
	<div class="container">
		<div align="right">
			<button class="addbutton" type="submit"><a href='customer.php' style='text-decoration: none; color:white;'><span class="glyphicon glyphicon-plus"></span> Add Customer</a></button>
		</div>
		<br>
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<th>No</th>
					<th>Customer's Name</th>
					<th>Baby's Name</th>
					<th>Baby's Date of Birth</th>
					<th>Baby's Age</th>
					<th>Details</th>
				</tr>
				<?php
					// loop untuk isi db
				?>
			</table>
		</div>

	<!-- belom ada pagination -->
	</div>
</div>
<br>
<br>
<br>
<?php
	require('footer.php');
?>