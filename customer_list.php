<?php 
	require('header.php');
?>
<div class= "container-fluid">
	<div class="container">
		<div align="right">
			<button class="btn btn-default addbutton" type="button"><span class="glyphicon glyphicon-plus"></span> Add Customer</button>
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
	
<?php
	require('footer.php');
?>